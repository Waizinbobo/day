<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Str;


class HomeController extends Controller
{
    public function index(){
        $categories = Categories::All();
        $posts = Post ::latest('created_at')->paginate(6);
        $feature_post = Post::latest()->first();
        $latest_post = Post::latest('created_at')->take(7)->get();
        return view('frontend.index' , compact('categories','posts','feature_post','latest_post'));
    }

    public function detail($id){

        $post = Post::find($id);
        $latest_post = Post::latest('created_at')->take(7)->get();
        return view('frontend.detail', compact('post','latest_post'));
    }

    public function userRegister(){
        return view('frontend.userRegister');
    }

    public function store(Request $request){
        $validate =validator($request->All(),[
            'name' => 'required|min:3',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        if($user){
            return redirect()->back()->with('success' , 'Successful!');
        }
        
    }

    public function Login(){
        return view('frontend.userLogin');
    }

    public function UserLogin(Request $request){
        $credentials = $request -> validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request -> session() -> regenerate();
            $request->session()->put('user_id', Auth::user()->id);
            return redirect() -> intended('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    
    }

}
