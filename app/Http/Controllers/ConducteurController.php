<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConducteurController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return response()->json(['message' => 'List conducteurs']);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return response()->json(['message' => 'Show create conducteur form']);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // Basic validation updated to match migration schema
        $validated = $request->validate([
            'heures' => 'required|date_format:H:i',
            'campagnes' => 'required|string|max:255',
            'spots' => 'required|string|max:255',
            'duree' => 'required|integer',
            'numero' => 'required|string|max:255',
        ]);

        return response()->json(['message' => 'Conducteur created', 'data' => $validated], 201);
    }

    // Display the specified resource.
    public function show(string $id)
    {
        return response()->json(['message' => 'Show conducteur', 'id' => $id]);
    }

    // Show the form for editing the specified resource.
    public function edit(string $id)
    {
        return response()->json(['message' => 'Show edit conducteur form', 'id' => $id]);
    }

    // Update the specified resource in storage.
    public function update(Request $request, string $id)
    {
        // Basic validation updated to match migration schema
        $validated = $request->validate([
            'heures' => 'sometimes|date_format:H:i',
            'campagnes' => 'sometimes|string|max:255',
            'spots' => 'sometimes|string|max:255',
            'duree' => 'sometimes|integer',
            'numero' => 'sometimes|string|max:255',
        ]);

        return response()->json(['message' => 'Conducteur updated', 'id' => $id, 'data' => $validated]);
    }

    // Remove the specified resource from storage.
    public function destroy(string $id)
    {
        return response()->json(['message' => 'Conducteur deleted', 'id' => $id]);
    }
}
