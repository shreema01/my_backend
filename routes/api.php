<?php

use App\Http\Controllers\API\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\AuthorController;

Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);

// book,author route
Route::apiResource('books', BookController::class);
    
Route::apiResource('authors', AuthorController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('get-user', [AuthenticationController::class, 'userInfo']);
    Route::post('logout', [AuthenticationController::class, 'logOut']);
});
