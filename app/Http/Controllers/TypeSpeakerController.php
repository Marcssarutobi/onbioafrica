<?php

namespace App\Http\Controllers;

use App\Models\TypeSpeaker;
use Illuminate\Http\Request;

class TypeSpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TypeSpeaker::orderBy('id', 'desc')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $typeSpeaker = TypeSpeaker::create([
            'name' => $request->name,
        ]);

        return response()->json($typeSpeaker, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $typeSpeaker = TypeSpeaker::find($id);

        if (!$typeSpeaker) {
            return response()->json(['message' => 'TypeSpeaker not found'], 404);
        }

        return response()->json($typeSpeaker, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $typeSpeaker = TypeSpeaker::find($id);

        if (!$typeSpeaker) {
            return response()->json(['message' => 'TypeSpeaker not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $typeSpeaker->update([
            'name' => $request->name,
        ]);

        return response()->json($typeSpeaker, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typeSpeaker = TypeSpeaker::find($id);

        if (!$typeSpeaker) {
            return response()->json(['message' => 'TypeSpeaker not found'], 404);
        }

        $typeSpeaker->delete();

        return response()->json(['message' => 'TypeSpeaker deleted successfully'], 200);
    }
}
