<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Models\Post;

Route::get('/backend',function(){
    return view('backend.index');
});

// Route::get('/',function(){
//     return view('frontend.index');
// });

// for category
Route::resource('backend/category', CategoryController::class);

// for post
Route::get('backend/post/polist', [PostController::class,'index'])->name('PostList');

Route::resource('backend/post', PostController::class);

//User controller
Route::resource('backend/user', UserController::class);

//Home controller
Route::get('/' , [HomeController::class, 'index'])->name('index');

Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('DetailPage');

//Login controller

Route::get('admin/login',[LoginController::class, 'showLogin'])->name('ShowAdminLogin');
Route::post('admin/login', [LoginController::class, 'login'])->name('AdminLogin');
