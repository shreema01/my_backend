<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\AboutController;
use PharIo\Manifest\AuthorCollection;


Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);
Route::get('about', [AuthenticationController::class, 'index']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('get-user', [AuthenticationController::class, 'userInfo']);
    Route::post('logout', [AuthenticationController::class, 'logOut']);

    Route::apiResource('books', BookController::class);

    Route::apiResource('reviews', ReviewController::class);

    Route::apiResource('authors', AuthorController::class);

});
