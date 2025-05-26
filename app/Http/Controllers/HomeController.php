<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Post;

class HomeController extends Controller
{
    public function index(){
        $categories = Categories::All();
        $posts = Post ::All();
        $feature_post = Post::latest()->first();
        $latest_post = Post::latest('created_at')->take(7)->get();
        return view('frontend.index' , compact('categories','posts','feature_post','latest_post'));
    }

    public function detail($id){

        $post = Post::find($id);
        $latest_post = Post::latest('created_at')->take(7)->get();
        return view('frontend.detail', compact('post','latest_post'));
    }

}
