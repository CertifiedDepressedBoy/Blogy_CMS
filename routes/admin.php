<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('admin')->group(function(){

    Route::get('/list',[AdminController::class,'adminList'])->name('admin.list');
    Route::get('/addnewadmin',[AdminController::class,'addnewadmin'])->name('admin.add');
    Route::post('/create',[AdminController::class,'create'])->name('admin.create');
    Route::get('/remove/{id?}',[AdminController::class,'remove'])->name('admin.remove');
    Route::get('/categories',[AdminController::class,'categories'])->name('admin.categories');
    Route::get('/categories/create',[AdminController::class,'categoriesCreate'])->name('admin.categories.create');
    Route::post('/categories/create',[AdminController::class,'categoriesCreate'])->name('admin.categories.create');
    Route::get('/categories/update/{id?}',[AdminController::class,'categoriesUpdate'])->name('admin.categories.update');
    Route::post('/categories/update/{id?}',[AdminController::class,'categoriesUpdate'])->name('admin.categories.update');
    Route::get('/categories/delete/{id?}',[AdminController::class,'categoriesDelete'])->name('admin.categories.delete');
    Route::get('/posts',[AdminController::class,'posts'])->name('admin.posts');
    Route::get('/posts/delete/{id?}',[AdminController::class,'postsDelete'])->name('admin.posts.delete');
});
