<?php

namespace App\Http\Controllers;

use App\Models\TypeSponsors;
use Illuminate\Http\Request;

class TypeSponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TypeSponsors::orderBy('id', 'desc')->get();
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

        $typeSponsors = TypeSponsors::create([
            'name' => $request->name,
        ]);

        return response()->json($typeSponsors, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $typeSponsors = TypeSponsors::find($id);

        if (!$typeSponsors) {
            return response()->json(['message' => 'TypeSponsors not found'], 404);
        }

        return response()->json($typeSponsors, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $typeSponsors = TypeSponsors::find($id);

        if (!$typeSponsors) {
            return response()->json(['message' => 'TypeSponsors not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $typeSponsors->update([
            'name' => $request->name,
        ]);

        return response()->json($typeSponsors, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $typeSponsors = TypeSponsors::find($id);

        if (!$typeSponsors) {
            return response()->json(['message' => 'TypeSponsors not found'], 404);
        }

        $typeSponsors->delete();

        return response()->json(['message' => 'TypeSponsors deleted successfully'], 200);
    }
}
