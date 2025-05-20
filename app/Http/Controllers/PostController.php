<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Show the list of all posts
    public function index()
    {
        $posts = Post::all();
        return view('backend.post.polist', compact('posts'));
    }

    // Show the create post form
    public function create()
    {
        return view('backend.post.pocreate');
    }
}
