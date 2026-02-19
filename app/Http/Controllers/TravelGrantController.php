<?php

namespace App\Http\Controllers;

use App\Models\TravelGrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TravelGrantController extends Controller
{
    /**
     * Liste tous les travel grants
     */
    public function index()
    {
        $travelGrants = TravelGrant::orderBy('id','desc')->get();

        return response()->json([
            'success' => true,
            'data' => $travelGrants
        ]);
    }

    /**
     * Créer un nouveau travel grant
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'         => 'required|string|max:255',
            'prenom'      => 'required|string|max:255',
            'email'       => 'required|email|unique:travel_grants,email',
            'phone'       => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'country'     => 'nullable|string|max:255',
            'documents'   => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx,jpg,png|max:5120',
            'status'      => 'nullable|string|in:pending,approved,rejected',
        ]);

        // Valeurs par défaut
        $validated['status'] = $validated['status'] ?? 'pending';
        $validated['doc_path'] = [];

        // Gestion des documents
        if ($request->hasFile('documents')) {
            $paths = [];
            foreach ($request->file('documents') as $file) {
                $path = $file->store('travel-grants/documents', 'public');
                $paths[] = $path;
            }
            $validated['doc_path'] = $paths;
        }

        $travelGrant = TravelGrant::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Travel grant créé avec succès',
            'data' => $travelGrant
        ], 200);
    }

     /**
     * Afficher un travel grant spécifique
     */
    public function show($id)
    {
        $travelGrant = TravelGrant::find($id);

        if (!$travelGrant) {
            return response()->json([
                'success' => false,
                'message' => 'Travel grant non trouvé'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $travelGrant
        ]);
    }

    /**
     * Mettre à jour un travel grant
     */
    public function update(Request $request, $id)
    {
        $travelGrant = TravelGrant::find($id);

        if (!$travelGrant) {
            return response()->json([
                'success' => false,
                'message' => 'Travel grant non trouvé'
            ], 404);
        }

        $validated = $request->validate([
            'nom'         => 'sometimes|required|string|max:255',
            'prenom'      => 'sometimes|required|string|max:255',
            'email'       => 'sometimes|required|email|unique:travel_grants,email,' . $id,
            'phone'       => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
            'country'     => 'nullable|string|max:255',
            'documents'   => 'nullable|array',
            'documents.*' => 'file|mimes:pdf,doc,docx,jpg,png|max:5120',
            'status'      => 'nullable|string|in:pending,approved,rejected',
        ]);

        // Gestion des nouveaux documents (ajoute aux existants)
        if ($request->hasFile('documents')) {
            $paths = $travelGrant->doc_path ?? [];
            
            foreach ($request->file('documents') as $file) {
                $path = $file->store('travel-grants/documents', 'public');
                $paths[] = $path;
            }
            
            $validated['doc_path'] = $paths;
        }

        $travelGrant->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Travel grant mis à jour avec succès',
            'data' => $travelGrant
        ], 200);
    }

    /**
     * Supprimer un travel grant
     */
    public function destroy($id)
    {
        $travelGrant = TravelGrant::find($id);

        if (!$travelGrant) {
            return response()->json([
                'success' => false,
                'message' => 'Travel grant non trouvé'
            ], 404);
        }

        // Suppression des documents associés
        if (!empty($travelGrant->doc_path)) {
            foreach ($travelGrant->doc_path as $path) {
                Storage::disk('public')->delete($path);
            }
        }

        $travelGrant->delete();

        return response()->json([
            'success' => true,
            'message' => 'Travel grant supprimé avec succès'
        ], 200);
    }

    /**
     * Supprimer un document spécifique
     */
    public function deleteDocument($id, $documentIndex)
    {
        $travelGrant = TravelGrant::find($id);

        if (!$travelGrant) {
            return response()->json([
                'success' => false,
                'message' => 'Travel grant non trouvé'
            ], 404);
        }

        $documents = $travelGrant->doc_path ?? [];

        if (!isset($documents[$documentIndex])) {
            return response()->json([
                'success' => false,
                'message' => 'Document non trouvé'
            ], 404);
        }

        // Supprime le fichier
        Storage::disk('public')->delete($documents[$documentIndex]);

        // Retire du tableau
        unset($documents[$documentIndex]);
        $travelGrant->update(['doc_path' => array_values($documents)]);

        return response()->json([
            'success' => true,
            'message' => 'Document supprimé avec succès',
            'data' => $travelGrant
        ]);
    }

    /**
     * Filtrer par statut
     */
    public function byStatus($status)
    {
        $travelGrants = TravelGrant::where('status', $status)->get();

        return response()->json([
            'success' => true,
            'data' => $travelGrants
        ]);
    }

    /**
     * Approuver un travel grant
     */
    public function approve($id)
    {
        $travelGrant = TravelGrant::find($id);

        if (!$travelGrant) {
            return response()->json([
                'success' => false,
                'message' => 'Travel grant non trouvé'
            ], 404);
        }

        $travelGrant->update(['status' => 'approved']);

        return response()->json([
            'success' => true,
            'message' => 'Travel grant approuvé',
            'data' => $travelGrant
        ]);
    }

    /**
     * Rejeter un travel grant
     */
    public function reject($id)
    {
        $travelGrant = TravelGrant::find($id);

        if (!$travelGrant) {
            return response()->json([
                'success' => false,
                'message' => 'Travel grant non trouvé'
            ], 404);
        }

        $travelGrant->update(['status' => 'rejected']);

        return response()->json([
            'success' => true,
            'message' => 'Travel grant rejeté',
            'data' => $travelGrant
        ]);
    }

}
