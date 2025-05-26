<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Show the list of all posts
    public function index()
    {
        $posts = Post::with('category')->paginate(5);
        return view('backend.post.polist', compact('posts'));
    }

    // Show the create post form
    public function create()
    {
        // return view('backend.post.pocreate');
        $categories = Categories::all();
        return view('backend.post.pocreate', compact('categories'));
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

    public function edit($id) {
        $post = Post::find($id);
        $categories = Categories::all();
        return view('backend.post.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id) {
    $post = Post::findOrFail($id);

    $data = $request->validate([
        'titel' => 'required',
        'category_id' => 'required|exists:categories,id',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:1024',
    ]);

    if ($request->hasFile('image')) {
        $data['cover'] = $request->file('image')->store('uploads/posts', 'public');
    } else {
        $data['cover'] = $post->cover;
    }

    $post->update([
        'titel' => $data['titel'],
        'category_id' => $data['category_id'],
        'description' => $data['description'],
        'cover' => $data['cover'],
    ]);

    return redirect()->route('PostList')->with('success', 'Post updated!');
}


    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('PostList')->with('success', 'Post deleted!');
    }
        
}
