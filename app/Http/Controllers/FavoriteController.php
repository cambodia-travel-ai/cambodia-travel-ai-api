<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Destination;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    // Get authenticated user's favorites
    public function index(Request $request)
    {
        $favorites = Favorite::with('destination')
            ->where('user_id', $request->user()->id)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Favorites retrieved successfully',
            'data' => $favorites
        ]);
    }

    // Add destination to favorites
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:destinations,id'
        ]);

        $favorite = Favorite::firstOrCreate([
            'user_id' => $request->user()->id,
            'destination_id' => $request->destination_id
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Favorite added successfully',
            'data' => $favorite->load('destination')
        ], 201);
    }

    // Remove favorite
    public function destroy(Request $request, $id)
    {
        $favorite = Favorite::where('id', $id)
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$favorite) {
            return response()->json([
                'success' => false,
                'message' => 'Favorite not found'
            ], 404);
        }

        $favorite->delete();

        return response()->json([
            'success' => true,
            'message' => 'Favorite removed successfully'
        ]);
    }
}
