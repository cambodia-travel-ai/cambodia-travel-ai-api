<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\ProvinceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Provinces
Route::get('/provinces', [ProvinceController::class, 'index']);
Route::get('/provinces/{province}', [ProvinceController::class, 'show']);

// Categories
Route::get('/categories', [CategoryController::class, 'index']);

// Destinations
Route::get('/destinations', [DestinationController::class, 'index']);
Route::post('/destinations', [DestinationController::class, 'store']);
Route::get('/destinations/{destination}', [DestinationController::class, 'show']);
Route::put('/destinations/{destination}', [DestinationController::class, 'update']);
Route::delete('/destinations/{destination}', [DestinationController::class, 'destroy']);
