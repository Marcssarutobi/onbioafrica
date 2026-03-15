<?php

namespace App\Http\Controllers;

use App\Mail\GuestInvitation;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;

class GuestController extends Controller
{
    /**
     * Liste tous les guests
     */
    public function index()
    {
        $guests = Guest::orderBy('id','desc')->get();

        return response()->json([
            'success' => true,
            'data' => $guests
        ]);
    }

    /**
     * Créer un nouveau guest
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'       => 'required|string|max:255',
            'prenom'    => 'required|string|max:255',
            'phone'     => 'nullable|string|max:255',
            'type'     => 'nullable|string|max:255',
            'email'     => 'nullable|email|unique:guests,email',
            'reference' => 'nullable|string|max:255|unique:guests,reference',
            'prensence' => 'nullable|boolean',
        ]);

         // 🔹 Création du guest sans référence si elle n'est pas fournie
        $guest = Guest::create($validated);

        // 🔹 Génération automatique de la référence si vide
        if (empty($validated['reference'])) {
            $guest->reference = 'OBA-' . date('Y') . '-' . str_pad($guest->id, 4, '0', STR_PAD_LEFT);
            $guest->save();
        }

        /* =========================
        1️⃣ GÉNÉRER LE PDF
        ========================= */

        $pdfPath = storage_path("app/invitations/invitation_{$guest->id}.pdf");

        if (!file_exists(dirname($pdfPath))) {
            mkdir(dirname($pdfPath), 0755, true);
        }

        Pdf::loadView('pdf.invitation', [
            'guest' => $guest
        ])
        ->setPaper('A4', 'portrait')
        ->save($pdfPath);

        Mail::to($guest->email)->send(new GuestInvitation($guest,$pdfPath));

        return response()->json([
            'success' => true,
            'message' => 'Guest créé avec succès',
            'data' => $guest
        ], 200);
    }

    /**
     * Afficher un guest spécifique
     */
    public function show($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json([
                'success' => false,
                'message' => 'Guest non trouvé'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $guest
        ]);
    }

    /**
     * Mettre à jour un guest
     */
    public function update(Request $request, $id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json([
                'success' => false,
                'message' => 'Guest non trouvé'
            ], 404);
        }

        $validated = $request->validate([
            'nom'       => 'sometimes|required|string|max:255',
            'prenom'    => 'sometimes|required|string|max:255',
            'phone'     => 'nullable|string|max:255',
            'type'     => 'nullable|string|max:255',
            'email'     => 'nullable|email|unique:guests,email,' . $id,
            'reference' => 'nullable|string|max:255|unique:guests,reference,' . $id,
            'prensence' => 'nullable|boolean',
        ]);

        $guest->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Guest mis à jour avec succès',
            'data' => $guest
        ], 200);
    }

    /**
     * Supprimer un guest
     */
    public function destroy($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json([
                'success' => false,
                'message' => 'Guest non trouvé'
            ], 404);
        }

        $guest->delete();

        return response()->json([
            'success' => true,
            'message' => 'Guest supprimé avec succès'
        ], 200);
    }

    /**
     * Rechercher un guest par référence
     */
    public function findByReference($reference)
    {
        $guest = Guest::where('reference', $reference)->first();

        if (!$guest) {
            return response()->json([
                'success' => false,
                'message' => 'Guest non trouvé'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $guest
        ]);
    }

    /**
     * Marquer présence/absence
     */
    public function togglePresence($id)
    {
        $guest = Guest::find($id);

        if (!$guest) {
            return response()->json([
                'success' => false,
                'message' => 'Guest non trouvé'
            ], 404);
        }

        $guest->update(['prensence' => !$guest->prensence]);

        return response()->json([
            'success' => true,
            'message' => $guest->prensence ? 'Présence confirmée' : 'Absence marquée',
            'data' => $guest
        ]);
    }

    /**
     * Liste des présents / absents
     */
    public function byPresence($status)
    {
        $presence = filter_var($status, FILTER_VALIDATE_BOOLEAN);
        
        $guests = Guest::where('prensence', $presence)->get();

        return response()->json([
            'success' => true,
            'data' => $guests
        ]);
    }

}
