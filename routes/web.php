<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/home', function () {
    return view('home');
});

Route::get('/detail',function(){
    return view('detail');
});
// Route::get('users', function(){
//     return "Mg Mg";
// });

// Route::get("user/{id}" , function($id){
//     return "This is id $id";
// });

// Route::get("/greeting" , function(){
//     return "Hello World!";
// })->name('Greeting');

// Route::get("/into" , function(){
//     return redirect('/home');
// });

// Route::get("/phone" ,function(){
//     return view('phone');
// });

// Route::resource("/Post" ,PostController::class);
