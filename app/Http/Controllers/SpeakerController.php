<?php

namespace App\Http\Controllers;

use App\Models\Speaker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
    /**
     * Liste tous les speakers
     */
    public function index()
    {
        $speakers = Speaker::with(['programs','typeSpeaker'])->orderBy('id','desc')->get();

        return response()->json([
            'success' => true,
            'data' => $speakers
        ]);
    }

    public function allSpeakers(){
        $data = Speaker::with('typeSpeaker')->orderBy('id','desc')->get();

        // Regroupe par type de speaker
        $speakersByType = $data->groupBy(function($speaker) {
            return $speaker->typeSpeaker ? $speaker->typeSpeaker->name : 'Autres';
        });

        return response()->json([
            'success' => true,
            'data' => $data,
            'byType' => $speakersByType
        ]);
    }

    public function showSpeaker($id){
        $speaker = Speaker::with('programs')->find($id);
        return response()->json([
            'success' => true,
            'data' => $speaker
        ]);
    }

    
    /**
     * Créer un nouveau speaker
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname'   => 'required|string|max:255',
            'lastname'    => 'required|string|max:255',
            'email'       => 'required|email|unique:speakers,email',
            'country'     => 'nullable|string|max:255',
            'affiliation' => 'nullable|string|max:255',
            'bio'         => 'nullable|string',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'type_speaker_id'  => 'nullable',
        ]);

        // Gestion de la photo
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('speakers/photos', 'public');
            $validated['photo'] = $path;
        }

        $speaker = Speaker::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Speaker créé avec succès',
            'data' => $speaker
        ], 200);
    }

    /**
     * Afficher un speaker spécifique
     */
    public function show($id)
    {
        $speaker = Speaker::find($id);
        return response()->json([
            'success' => true,
            'data' => $speaker
        ]);
    }

    public function update(Request $request, $id)
    {
        $speaker = Speaker::find($id);

        if (!$speaker) {
            return response()->json([
                'success' => false,
                'message' => 'Speaker non trouvé'
            ], 404);
        }

        $validated = $request->validate([
            'firstname'   => 'sometimes|required|string|max:255',
            'lastname'    => 'sometimes|required|string|max:255',
            'email'       => 'sometimes|required|email|unique:speakers,email,' . $id,
            'country'     => 'nullable|string|max:255',
            'affiliation' => 'nullable|string|max:255',
            'bio'         => 'nullable|string',
            'photo'       => 'nullable',
            'type_speaker_id'        => 'nullable',
        ]);

         // ⚡ Gestion de la photo
        if ($request->hasFile('photo')) {
            // Nouvelle photo uploadée
            $path = $request->file('photo')->store('speakers/photos', 'public');

            // Supprimer ancienne photo si elle existe
            if ($speaker->photo && Storage::disk('public')->exists($speaker->photo)) {
                Storage::disk('public')->delete($speaker->photo);
            }

            $validated['photo'] = $path;
        } else if (isset($validated['photo']) && is_string($validated['photo'])) {
            // Si la Vue envoie un chemin ou URL, on garde l’ancienne photo
            unset($validated['photo']);
        }

        $speaker->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Speaker mis à jour avec succès',
            'data' => $speaker
        ], 200);
    }

    /**
     * Supprimer un speaker
     */
    public function destroy($id)
    {
        $speaker = Speaker::find($id);

        if (!$speaker) {
            return response()->json([
                'success' => false,
                'message' => 'Speaker non trouvé'
            ], 404);
        }

        // Suppression de la photo si elle existe
        if ($speaker->photo) {
            Storage::disk('public')->delete($speaker->photo);
        }

        $speaker->delete();

        return response()->json([
            'success' => true,
            'message' => 'Speaker supprimé avec succès'
        ], 200);
    }
}
