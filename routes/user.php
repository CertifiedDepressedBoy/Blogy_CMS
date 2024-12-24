<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;

Route::prefix('user')->middleware('user')->group(function(){
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

    Route::patch('/posts/{id?}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id?}', [PostController::class, 'update'])->name('posts.update');





    Route::post('/posts/comment/{id?}', [PostController::class, 'commentCreate'])->name('posts.comment.create');
    
});

