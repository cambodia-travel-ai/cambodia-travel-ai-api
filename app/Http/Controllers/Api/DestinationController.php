<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDestinationRequest;
use App\Http\Requests\UpdateDestinationRequest;
use App\Models\Destination;

class DestinationController extends Controller
{
    /**
     * Display a listing of destinations.
     */
    public function index()
    {
        return response()->json(Destination::with(['province', 'category'])->get());
    }

    /**
     * Display the specified destination.
     */
    public function show(Destination $destination)
    {
        return response()->json($destination->load(['province', 'category']));
    }

    /**
     * Store a newly created destination.
     */
    public function store(StoreDestinationRequest $request)
    {
        $destination = Destination::create($request->validated());

        return response()->json(
            $destination->load(['province', 'category']),
            201
        );
    }

    /**
     * Update the specified destination.
     */
    public function update(UpdateDestinationRequest $request, Destination $destination)
    {
        $destination->update($request->validated());

        return response()->json($destination->load(['province', 'category']));
    }

    /**
     * Remove the specified destination.
     */
    public function destroy(Destination $destination)
    {
        $destination->delete();

        return response()->json(['message' => 'Destination deleted successfully']);
    }
}