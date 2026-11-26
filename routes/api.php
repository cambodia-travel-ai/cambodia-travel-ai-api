<?php

use App\Http\Controllers\API\AIChatController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RestaurantController;
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
 */

/*
 |--------------------------------------------------------------------------
 | Authenticated User
 |--------------------------------------------------------------------------
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
 |--------------------------------------------------------------------------
 | AI Chat Endpoints
 |--------------------------------------------------------------------------
 */
Route::middleware('throttle:60,1')->group(function () {
    Route::post('/ai/chat', [AIChatController::class, 'store']);
    Route::get('/ai/conversations', [AIChatController::class, 'index']);
    Route::get('/ai/conversations/{id}', [AIChatController::class, 'show']);
});

/*
 |--------------------------------------------------------------------------
 | Hotel Endpoints
 |--------------------------------------------------------------------------
 */
// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/hotels', [HotelController::class, 'index']);
    Route::post('/hotels', [HotelController::class, 'store']);
    Route::get('/hotels/{id}', [HotelController::class, 'show']);
    Route::put('/hotels/{id}', [HotelController::class, 'update']);
    Route::delete('/hotels/{id}', [HotelController::class, 'destroy']);
// });

/*
 |--------------------------------------------------------------------------
 | Restaurant Endpoints
 |--------------------------------------------------------------------------
 */
// Route::middleware('auth:sanctum')->group(function () {
    Route::get('/restaurants', [RestaurantController::class, 'index']);
    Route::post('/restaurants', [RestaurantController::class, 'store']);
    Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);
    Route::put('/restaurants/{id}', [RestaurantController::class, 'update']);
    Route::delete('/restaurants/{id}', [RestaurantController::class, 'destroy']);
// });