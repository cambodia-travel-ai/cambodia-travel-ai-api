
<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\DestinationController;
use App\Http\Controllers\Api\ProvinceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReviewController;

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    Route::apiResource('destinations', DestinationController::class);
});

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/users', [UserController::class, 'index']);

    Route::get('/users/{id}', [UserController::class, 'show']);

    Route::post('/users', [UserController::class, 'store']);

    Route::put('/users/{id}', [UserController::class, 'update']);

    Route::delete('/users/{id}', [UserController::class, 'destroy']);

    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });

    Route::put('/user/profile', [UserController::class, 'updateProfile']);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::post('/favorites', [FavoriteController::class, 'store']);
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy']);
});



Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{id}', [ReviewController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/destinations/{id}/reviews', [ReviewController::class, 'store']);
    Route::put('/reviews/{id}', [ReviewController::class, 'update']);
    Route::delete('/reviews/{id}', [ReviewController::class, 'destroy']);
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
