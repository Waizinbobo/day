<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('frontend.detail');
});

Route::get('/dashboard',function(){
    return view('backend.index');
});

// Route::get('/dashboard/category',function(){
//     return view('backend.category.index');
// });

Route::get('/login',function(){
    return view('frontend.login');
});

Route::get('/register',function(){
    return view('frontend.register');
});

Route::get('/error',function(){
    return view('error.401');
});

Route::get('/Catlist', function(){
    return view('backend.category.Catlist');
});

Route::get('/Catcreate', function(){
    return view('backend.category.Catcreate');
});

Route::get('/Postlist', function(){
    return view('backend.post.polist');
});

Route::get('/Postcreate', function(){
    return view('backend.post.pocreate');
});

Route::get('/Userlist', function(){
    return view('backend.user.userlist');
});

Route::get('/Usercreate', function(){
    return view('backend.user.usercreate');
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
