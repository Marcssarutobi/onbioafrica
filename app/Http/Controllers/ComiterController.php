<?php

namespace App\Http\Controllers;

use App\Models\Comiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ComiterController extends Controller
{
    
    /**
     * Liste tous les comités
     */
    public function index()
    {
        $comiters = Comiter::orderBy('created_at', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $comiters
        ]);
    }

    public function allComiters(){
        $data = Comiter::orderBy('created_at', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

   

    /**
     * Créer un nouveau membre du comité
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fullname' => 'required|string|max:255',
            'post'     => 'nullable|string|max:255',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('comiters/images', 'public');
            $validated['image'] = $path;
        }

        $comiter = Comiter::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Membre du comité créé avec succès',
            'data' => $comiter
        ], 200);
    }

    /**
     * Afficher un membre du comité spécifique
     */
    public function show($id)
    {
        $comiter = Comiter::find($id);

        if (!$comiter) {
            return response()->json([
                'success' => false,
                'message' => 'Membre du comité non trouvé'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $comiter
        ]);
    }

    /**
     * Mettre à jour un membre du comité
     */
    public function update(Request $request, $id)
    {
        $comiter = Comiter::find($id);

        if (!$comiter) {
            return response()->json([
                'success' => false,
                'message' => 'Membre du comité non trouvé'
            ], 404);
        }

        $validated = $request->validate([
            'fullname' => 'sometimes|required|string|max:255',
            'post'     => 'nullable|string|max:255',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Gestion de l'image (supprime l'ancienne si nouvelle)
        if ($request->hasFile('image')) {
            if ($comiter->image) {
                Storage::disk('public')->delete($comiter->image);
            }
            $path = $request->file('image')->store('comiters/images', 'public');
            $validated['image'] = $path;
        }

        $comiter->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Membre du comité mis à jour avec succès',
            'data' => $comiter
        ], 200);
    }

     /**
     * Supprimer un membre du comité
     */
    public function destroy($id)
    {
        $comiter = Comiter::find($id);

        if (!$comiter) {
            return response()->json([
                'success' => false,
                'message' => 'Membre du comité non trouvé'
            ], 404);
        }

        // Suppression de l'image si elle existe
        if ($comiter->image) {
            Storage::disk('public')->delete($comiter->image);
        }

        $comiter->delete();

        return response()->json([
            'success' => true,
            'message' => 'Membre du comité supprimé avec succès'
        ], 200);
    }

}
