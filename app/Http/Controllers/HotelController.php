<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Hotel::query();

        // Search by name, description, or address
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%');
            });
        }

        // Filter by province
        if ($request->has('province_id')) {
            $query->where('province_id', $request->get('province_id'));
        }

        // Filter by destination
        if ($request->has('destination_id')) {
            $query->where('destination_id', $request->get('destination_id'));
        }

        // Minimum rating
        if ($request->has('min_rating')) {
            $query->where('rating', '>=', $request->get('min_rating'));
        }

        // Minimum price per night
        if ($request->has('min_price')) {
            $query->where('price_per_night', '>=', $request->get('min_price'));
        }

        // Maximum price per night
        if ($request->has('max_price')) {
            $query->where('price_per_night', '<=', $request->get('max_price'));
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'created_at');
        $sortOrder = $request->get('sort_order', 'desc');

        // Validate sort fields
        $validSortBy = ['name', 'rating', 'price_per_night', 'created_at'];
        $validSortOrder = ['asc', 'desc'];

        if (!in_array($sortBy, $validSortBy)) {
            $sortBy = 'created_at';
        }
        if (!in_array($sortOrder, $validSortOrder)) {
            $sortOrder = 'desc';
        }

        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $perPage = $request->get('per_page', 15);
        $maxPerPage = 50;

        if ($perPage > $maxPerPage) {
            $perPage = $maxPerPage;
        }

        $page = $request->get('page', 1);

        $hotels = $query->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'success' => true,
            'data' => $hotels,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'province_id' => 'required|exists:provinces,id',
            // 'destination_id' => 'nullable|exists:destinations,id',
            'province_id' => 'required|exists:provinces,id',
            'destination_id' => 'nullable|exists:destinations,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:30',
            'email' => 'nullable|string|email|max:255',
            'price_per_night' => 'required|numeric|between:0,999999.99',
            'rating' => 'nullable|numeric|between:0,5',
            'image_url' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'status' => 'nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        $hotel = Hotel::create($validator->validated());

        return response()->json([
            'success' => true,
            'data' => $hotel,
            'message' => 'Hotel created successfully',
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $hotel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel not found',
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
            'price_per_night' => 'sometimes|required|numeric|between:0,999999.99',
            'rating' => 'sometimes|nullable|numeric|between:0,5',
            'image_url' => 'sometimes|nullable|string',
            'latitude' => 'sometimes|nullable|numeric',
            'longitude' => 'sometimes|nullable|numeric',
            'status' => 'sometimes|nullable|string|max:20',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        $hotel->update($validator->validated());

        return response()->json([
            'success' => true,
            'data' => $hotel,
            'message' => 'Hotel updated successfully',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);

        if (!$hotel) {
            return response()->json([
                'success' => false,
                'message' => 'Hotel not found',
            ], 404);
        }

        $hotel->delete();

        return response()->json([
            'success' => true,
            'message' => 'Hotel deleted successfully',
        ]);
    }
}