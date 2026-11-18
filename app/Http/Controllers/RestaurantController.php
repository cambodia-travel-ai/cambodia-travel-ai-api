<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $restaurants = Restaurant::all();

        return response()->json([
            'success' => true,
            'data' => $restaurants,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'province_id' => 'required|exists:provinces,id',
            'destination_id' => 'nullable|exists:destinations,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|string|email|max:255',
            'image_url' => 'nullable|string',
            'price_range' => 'nullable|string',
            'rating' => 'nullable|numeric|between:0,5',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'opening_time' => 'nullable|date_format:H:i',
            'closing_time' => 'nullable|date_format:H:i',
            'status' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        $restaurant = Restaurant::create($validator->validated());

        return response()->json([
            'success' => true,
            'data' => $restaurant,
            'message' => 'Restaurant created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json([
                'success' => false,
                'message' => 'Restaurant not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $restaurant,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json([
                'success' => false,
                'message' => 'Restaurant not found',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'province_id' => 'sometimes|required|exists:provinces,id',
            'destination_id' => 'sometimes|nullable|exists:destinations,id',
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'address' => 'sometimes|nullable|string',
            'phone' => 'sometimes|nullable|string|max:30',
            'email' => 'sometimes|nullable|string|email|max:255',
            'image_url' => 'sometimes|nullable|string',
            'price_range' => 'sometimes|nullable|string',
            'rating' => 'sometimes|nullable|numeric|between:0,5',
            'latitude' => 'sometimes|nullable|numeric',
            'longitude' => 'sometimes|nullable|numeric',
            'opening_time' => 'sometimes|nullable|date_format:H:i',
            'closing_time' => 'sometimes|nullable|date_format:H:i',
            'status' => 'sometimes|nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        $restaurant->update($validator->validated());

        return response()->json([
            'success' => true,
            'data' => $restaurant,
            'message' => 'Restaurant updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json([
                'success' => false,
                'message' => 'Restaurant not found',
            ], 404);
        }

        $restaurant->delete();

        return response()->json([
            'success' => true,
            'message' => 'Restaurant deleted successfully',
        ]);
    }
}