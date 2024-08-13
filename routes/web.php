<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy']);

Route::view('/about', 'about');
Route::view('/contact', 'contact');

Route::prefix('/blogs')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('blogs');
    Route::get('/{post:title}', [PostController::class, 'show']);

    Route::middleware('auth')->group(function () {
        Route::get('/create', [PostController::class, 'create']);
        Route::post('/create', [PostController::class, 'store']);
        Route::get('/{post:title}/edit', [PostController::class, 'edit']);
        Route::patch('/{post:title}', [PostController::class, 'update']);
        Route::delete('/{post:title}', [PostController::class, 'destroy']);

        Route::post('/{post:title}', [CommentController::class, 'create']);
        Route::get('/{post:title}/comments', [CommentController::class, 'index']);
    });
});
