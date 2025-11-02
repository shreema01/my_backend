<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\AboutController;

// Public routes
Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);
Route::get('/about', [AuthenticationController::class, 'index']);


// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('get-user', [AuthenticationController::class, 'userInfo']);
    Route::post('logout', [AuthenticationController::class, 'logOut']);

    Route::apiResource('books', BookController::class);

    Route::apiResource('reviews', ReviewController::class);

});
