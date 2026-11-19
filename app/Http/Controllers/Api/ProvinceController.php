<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Province;

class ProvinceController extends Controller
{
    /**
     * Display a listing of provinces.
     */
    public function index()
    {
        return response()->json(Province::all());
    }

    /**
     * Display the specified province.
     */
    public function show(Province $province)
    {
        return response()->json($province->load('destinations'));
    }
}