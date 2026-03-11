<?php

namespace App\Http\Controllers;

use App\Models\Typecomite;
use Illuminate\Http\Request;

class TypecomiteController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Typecomite::orderBy('id', 'desc')->get();
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

        $Typecomite = Typecomite::create([
            'name' => $request->name,
        ]);

        return response()->json($Typecomite, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Typecomite = Typecomite::find($id);

        if (!$Typecomite) {
            return response()->json(['message' => 'Typecomite not found'], 404);
        }

        return response()->json($Typecomite, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Typecomite = Typecomite::find($id);

        if (!$Typecomite) {
            return response()->json(['message' => 'Typecomite not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $Typecomite->update([
            'name' => $request->name,
        ]);

        return response()->json($Typecomite, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Typecomite = Typecomite::find($id);

        if (!$Typecomite) {
            return response()->json(['message' => 'Typecomite not found'], 404);
        }

        $Typecomite->delete();

        return response()->json(['message' => 'Typecomite deleted successfully'], 200);
    }

}
