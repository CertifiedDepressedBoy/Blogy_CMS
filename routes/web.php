<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

require_once __DIR__.'/user.php';
require_once __DIR__.'/admin.php';

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
Route::get('404',function(){
    return view('components.404');
})->name('404');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/category/{name?}', [CategoryController::class, 'culture'])->name('category');
    Route::get('/posts/{id?}', [PostController::class, 'show'])->name('posts.show');
    Route::delete('/posts/{id?}', [PostController::class, 'destroy'])->name('posts.delete');
    Route::post('/search', [PostController::class, 'search'])->name('search');
    Route::delete('/posts/comment/delete/{id?}', [PostController::class, 'commentDelete'])->name('posts.comment.delete');
});

require __DIR__.'/auth.php';
