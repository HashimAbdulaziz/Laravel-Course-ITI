<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Middleware\EnsureJsonResponse;
use Illuminate\Support\Facades\Route;

Route::middleware(EnsureJsonResponse::class)->group(function () {

    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout']);
        
        Route::get('/posts', [PostController::class, 'index']);
        Route::get('/posts/{id}', [PostController::class, 'show']);
        Route::post('/posts', [PostController::class, 'store']);
        
    });

});