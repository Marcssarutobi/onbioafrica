<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    
    /**
     * Liste tous les programs
     */
    public function index()
    {
        $programs = Program::with('speaker')->orderBy('id','desc')->get();

        return response()->json([
            'success' => true,
            'data' => $programs
        ]);
    }

    /**
     * Créer un nouveau program
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'date'          => 'required|date',
            'start_time'    => 'required|date_format:H:i',
            'end_time'      => 'required|date_format:H:i|after:start_time',
            'session_title' => 'required|string|max:255',
            'session_type'  => 'nullable|string|max:255',
            'speaker_id'    => 'nullable|exists:speakers,id',
            'location'      => 'nullable|string|max:255',
            'isPublished'   => 'nullable|boolean',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        // Gestion de la photo
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('programs/photos', 'public');
            $validated['photo'] = $path;
        }

        $program = Program::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Program créé avec succès',
            'data' => $program->load('speaker')
        ], 200);
    }

    /**
     * Afficher un program spécifique
     */
    public function show($id)
    {
        $program = Program::with('speaker')->find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Program non trouvé'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $program
        ]);
    }

    /**
     * Mettre à jour un program
     */
    public function update(Request $request, $id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Program non trouvé'
            ], 404);
        }

        // ✅ Normaliser le boolean
        $request->merge([
            'isPublished' => filter_var(
                $request->isPublished,
                FILTER_VALIDATE_BOOLEAN,
                FILTER_NULL_ON_FAILURE
            )
        ]);

        // ✅ Si photo ≠ fichier → on l’enlève avant validation
        if (!$request->hasFile('photo')) {
            $request->request->remove('photo');
        }

        $validated = $request->validate([
            'date'          => 'sometimes|required|date',
            'start_time'    => 'sometimes|required|date_format:H:i',
            'end_time'      => 'sometimes|required|date_format:H:i|after:start_time',
            'session_title' => 'sometimes|required|string|max:255',
            'session_type'  => 'nullable|string|max:255',
            'speaker_id'    => 'nullable|exists:speakers,id',
            'location'      => 'nullable|string|max:255',
            'isPublished'   => 'nullable|boolean',
            'photo'         => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:10048',
        ]);

        // ✅ Gérer la photo uniquement si nouvelle
        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {

            if ($program->photo) {
                Storage::disk('public')->delete($program->photo);
            }

            $validated['photo'] = $request
                ->file('photo')
                ->store('programs/photos', 'public');
        }

        $program->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Program mis à jour avec succès',
            'data' => $program->load('speaker')
        ]);
    }

     /**
     * Supprimer un program
     */
    public function destroy($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Program non trouvé'
            ], 404);
        }

        // Suppression de la photo si elle existe
        if ($program->photo) {
            Storage::disk('public')->delete($program->photo);
        }

        $program->delete();

        return response()->json([
            'success' => true,
            'message' => 'Program supprimé avec succès'
        ], 200);
    }

    /**
     * Liste des programs par date
     */
    public function byDate($date)
    {
        $programs = Program::with('speaker')
            ->whereDate('date', $date)
            ->orderBy('start_time')
            ->get();

        return response()->json([
            'success' => true,
            'data' => $programs
        ]);
    }

    /**
     * Publier/Dépublier un program
     */
    public function togglePublish($id)
    {
        $program = Program::find($id);

        if (!$program) {
            return response()->json([
                'success' => false,
                'message' => 'Program non trouvé'
            ], 404);
        }

        $program->update(['isPublished' => !$program->isPublished]);

        return response()->json([
            'success' => true,
            'message' => $program->isPublished ? 'Program publié' : 'Program dépublié',
            'data' => $program
        ]);
    }

    public function programsByDays()
    {
        $programs = Program::with('speaker')
            ->orderBy('date')
            ->orderBy('start_time')
            ->where('isPublished',true)
            ->get()
            ->groupBy('date');

        $days = [];
        $dayIndex = 1;

        foreach ($programs as $date => $items) {
            $days[] = [
                'day'  => 'Day ' . $dayIndex,
                'date' => $date,
                'programs' => $items
            ];
            $dayIndex++;
        }

        return response()->json([
            'success' => true,
            'data' => $days
        ]);
    }


}
