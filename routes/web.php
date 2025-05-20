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

Route::resource('backend/category', CategoryController::class);

// Route::resource('category', CategoryController::class)->names('category');

Route::resource('backend/post', PostController::class);

Route::resource('backend/user', UserController::class);


