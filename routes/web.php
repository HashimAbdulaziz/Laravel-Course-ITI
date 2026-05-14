<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;


Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/create', [PostController::class, 'create']);
    Route::get('/{id}', [PostController::class, 'show']);
    Route::get('/{id}/edit', [PostController::class, 'edit']);

    Route::delete('/{id}/delete', [PostController::class, 'destroy']);

    Route::post('/', [PostController::class, 'store']);
    Route::post('/{id}', [PostController::class, 'update']);
});