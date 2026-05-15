<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::prefix('posts')->group(function () {
    Route::get('/', [PostController::class, 'index']);
    Route::get('/create', [PostController::class, 'create']);
    Route::get('/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/{id}/edit', [PostController::class, 'edit']);;

    Route::post('/', [PostController::class, 'store']);
    
    Route::patch('/{id}', [PostController::class, 'update']);
    
    Route::delete('/{id}', [PostController::class, 'destroy']);
});