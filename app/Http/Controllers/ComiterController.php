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
            ->sort(function ($a, $b) {
                $typeA = $a->typecomite->name ?? '';
                $typeB = $b->typecomite->name ?? '';

                // 1. Priorité absolue au groupe "Organizing Committee"
                if ($typeA === 'Organizing Committee' && $typeB !== 'Organizing Committee') return -1;
                if ($typeA !== 'Organizing Committee' && $typeB === 'Organizing Committee') return 1;

                // 2. Si les deux sont dans le même type de comité
                if ($typeA === $typeB) {
                    // On vérifie si la session commence par "Chair"
                    $isChairA = str_starts_with($a->session, 'Chair');
                    $isChairB = str_starts_with($b->session, 'Chair');

                    // CAS A : L'un est Chair et l'autre non
                    if ($isChairA && !$isChairB) return -1;
                    if (!$isChairA && $isChairB) return 1;

                    // CAS B : Les deux (ou plus) sont des "Chairs"
                    // On les trie entre eux par date de création (DESC - Plus récent d'abord)
                    if ($isChairA && $isChairB) {
                        return strtotime($b->created_at) <=> strtotime($a->created_at);
                    }

                    // CAS C : Aucun n'est Chair
                    // On les trie entre eux par pays (ASC - A-Z)
                    return strcmp($a->country, $b->country);
                }

                // 3. Tri alphabétique pour les autres types de groupes (Scientific Committee, etc.)
                return strcmp($typeA, $typeB);
            })
            ->values() // Réinitialise les clés pour éviter des problèmes d'index dans le JSON
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
