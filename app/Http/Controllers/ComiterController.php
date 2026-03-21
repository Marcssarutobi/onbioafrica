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
        $comiters = Comiter::with('typecomite')->orderBy('country', 'asc')->get();

        return response()->json([
            'success' => true,
            'data' => $comiters
        ]);
    }

    public function allComiters() {
        $data = Comiter::with('typecomite')
            ->get()
            // 1. On trie la liste plate avant de grouper
            ->sort(function ($a, $b) {
                $nameA = $a->typecomite->name ?? '';
                $nameB = $b->typecomite->name ?? '';

                // PRIORITÉ 1 : Le groupe "Organizing Committee" passe en haut
                if ($nameA === 'Organizing Committee' && $nameB !== 'Organizing Committee') return -1;
                if ($nameA !== 'Organizing Committee' && $nameB === 'Organizing Committee') return 1;

                // PRIORITÉ 2 : Si les types sont identiques, on trie par pays (A-Z)
                if ($nameA === $nameB) {
                    return strcmp($a->country, $b->country);
                }

                // Pour les autres types, on les laisse par défaut ou par ordre alphabétique de type
                return strcmp($nameA, $nameB);
            })
            // 2. On groupe (l'ordre des clés du JSON suivra l'ordre des données triées)
            ->values() // Réinitialise les index numériques avant le groupement
            ->groupBy('typecomite.name');

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
            'affiliation'     => 'nullable|string|max:255',
            'session'     => 'nullable|string|max:255',
            'bio'         => 'nullable|string',
            'country'         => 'nullable|string',
            'typecomite_id'  => 'nullable',
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
            'affiliation'     => 'nullable|string|max:255',
            'session'     => 'nullable|string|max:255',
            'bio'         => 'nullable|string',
            'country'         => 'nullable|string',
            'typecomite_id'  => 'nullable',
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
