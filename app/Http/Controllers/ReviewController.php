<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'destination'])
            ->latest()
            ->get();

        return response()->json([
            'message' => 'Reviews retrieved successfully',
            'data' => $reviews
        ]);
    }


    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $destination = \App\Models\Destination::find($id);

        if (!$destination) {
            return response()->json([
                'message' => 'Destination not found'
            ], 404);
        }

        $review = Review::create([
            'user_id' => Auth::id(),
            'destination_id' => $destination->id,
            'rating' => $request->rating,
            'comment' => $request->comment
        ]);

        return response()->json([
            'message' => 'Review created successfully',
            'data' => $review
        ], 201);
    }

    public function show($id)
    {
        $review = Review::with(['user', 'destination'])
            ->find($id);

        if (!$review) {
            return response()->json([
                'message' => 'Review not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Review retrieved successfully',
            'data' => $review
        ]);
    }

    public function update(Request $request, $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'message' => 'Review not found'
            ], 404);
        }

        if ($review->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $request->validate([
            'rating' => 'sometimes|required|integer|min:1|max:5',
            'comment' => 'nullable|string'
        ]);

        $review->update($request->only([
            'rating',
            'comment'
        ]));

        return response()->json([
            'message' => 'Review updated successfully',
            'data' => $review
        ]);
    }

    public function destroy($id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json([
                'message' => 'Review not found'
            ], 404);
        }

        if ($review->user_id !== Auth::id()) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 403);
        }

        $review->delete();

        return response()->json([
            'message' => 'Review deleted successfully'
        ]);
    }
}
