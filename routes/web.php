<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard',[PostController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/contact_me',function(){
    return view('contact');
});
Route::get('/about_me',function(){
    return view('about');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id?}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/posts/{id?}', [PostController::class, 'destroy'])->name('posts.delete');
    Route::patch('/posts/{id?}', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id?}', [PostController::class, 'update'])->name('posts.update');

    Route::get('/category/{name?}', [CategoryController::class, 'culture'])->name('category');

    Route::post('/search', [PostController::class, 'search'])->name('search');

    Route::post('/posts/comment/{id?}', [PostController::class, 'commentCreate'])->name('posts.comment.create');
    Route::delete('/posts/comment/{id?}', [PostController::class, 'commentDelete'])->name('posts.comment.delete');
});

require __DIR__.'/auth.php';
