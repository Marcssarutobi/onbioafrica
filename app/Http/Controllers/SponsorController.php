<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SponsorController extends Controller
{
    
    /**
     * Liste tous les sponsors
     */
    public function index()
    {
        $sponsors = Sponsor::with('typeSponsor')->orderBy('id','desc')->get();

        return response()->json([
            'success' => true,
            'data' => $sponsors
        ]);
    }

     /**
     * Créer un nouveau sponsor
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:sponsors,name',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_sponsor_id'  => 'nullable',
        ]);

        // Gestion du logo
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('sponsors/logos', 'public');
            $validated['logo'] = $path;
        }

        $sponsor = Sponsor::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Sponsor créé avec succès',
            'data' => $sponsor
        ], 200);
    }

    /**
     * Afficher un sponsor spécifique
     */
    public function show($id)
    {
        $sponsor = Sponsor::find($id);

        if (!$sponsor) {
            return response()->json([
                'success' => false,
                'message' => 'Sponsor non trouvé'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $sponsor
        ]);
    }

     /**
     * Mettre à jour un sponsor
     */
    public function update(Request $request, $id)
    {
        $sponsor = Sponsor::find($id);

        if (!$sponsor) {
            return response()->json([
                'success' => false,
                'message' => 'Sponsor non trouvé'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255|unique:sponsors,name,' . $id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'type_sponsor_id'  => 'nullable',
        ]);

        // Gestion du logo (supprime l'ancien si nouveau)
        if ($request->hasFile('logo')) {
            if ($sponsor->logo) {
                Storage::disk('public')->delete($sponsor->logo);
            }
            $path = $request->file('logo')->store('sponsors/logos', 'public');
            $validated['logo'] = $path;
        }

        $sponsor->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Sponsor mis à jour avec succès',
            'data' => $sponsor
        ], 200);
    }

     /**
     * Supprimer un sponsor
     */
    public function destroy($id)
    {
        $sponsor = Sponsor::find($id);

        if (!$sponsor) {
            return response()->json([
                'success' => false,
                'message' => 'Sponsor non trouvé'
            ], 404);
        }

        // Suppression du logo si existe
        if ($sponsor->logo) {
            Storage::disk('public')->delete($sponsor->logo);
        }

        $sponsor->delete();

        return response()->json([
            'success' => true,
            'message' => 'Sponsor supprimé avec succès'
        ], 200);
    }

}
