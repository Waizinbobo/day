<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Post;


class UserPostController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('frontend.post', compact('categories'));
    }

    public function store(Request $request){
       $validator = validator($request->all(),[
        'title' => 'required|min:3',
        'category' => 'required|exists:categories,id',
        'description' => 'required|min:7',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024'
        ]);


        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads/posts', 'public');
        }

        Post::create([
            'titel' => $request->titel,
            'category_id' => $request->category,
            'description' => $request->description,
            'cover' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Post created successfully!');
    }
}
