<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryCOntroller;


Route::get('/backend',function(){
    return view('backend.index');
});

Route::get('/',function(){
    return view('frontend.index');
});

Route::resource('backend/category', CategoryCOntroller::class);