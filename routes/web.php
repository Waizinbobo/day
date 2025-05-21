<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;


Route::get('/backend',function(){
    return view('backend.index');
});

Route::get('/',function(){
    return view('frontend.index');
});

// for category
Route::resource('backend/category', CategoryController::class);

// for post
Route::get('post/polist', [PostController::class,'index'])->name('PostList');
Route::get('post/create', [PostController::class,'create'])->name('Postcreate');
Route::post('post/store',[PostController::class,'store'])->name('poststore');





Route::resource('backend/user', UserController::class);


