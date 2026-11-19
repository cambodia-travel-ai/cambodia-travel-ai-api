<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    // GET: Get all destinations
    public function index()
    {
        $destinations = Destination::all();

        return response()->json([
            'message' => 'Destinations retrieved successfully',
            'data' => $destinations
        ], 200);
    }

    // POST: Create a destination
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $destination = Destination::create($validated);

        return response()->json([
            'message' => 'Destination created successfully',
            'data' => $destination
        ], 201);
    }

    // GET: Get one destination
    public function show($id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'message' => 'Destination not found'
            ], 404);
        }

        return response()->json([
            'data' => $destination
        ], 200);
    }

    // PUT: Update a destination
    public function update(Request $request, $id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'message' => 'Destination not found'
            ], 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'location' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'category' => 'nullable|string|max:255',
            'image' => 'nullable|string|max:255',
            'latitude' => 'nullable|numeric|between:-90,90',
            'longitude' => 'nullable|numeric|between:-180,180',
        ]);

        $destination->update($validated);

        return response()->json([
            'message' => 'Destination updated successfully',
            'data' => $destination
        ], 200);
    }

    // DELETE: Delete a destination
    public function destroy($id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json([
                'message' => 'Destination not found'
            ], 404);
        }

        $destination->delete();

        return response()->json([
            'message' => 'Destination deleted successfully'
        ], 200);
    }
}
