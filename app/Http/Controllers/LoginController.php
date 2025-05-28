<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin(){
        return view('frontend.login');
    }

    public function login(Request $request){
        $credentials = $request -> validate([
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials)){
            $request -> session() -> regenerate();
            
            if(Auth::user()->is_admin){
                $request->session()->put('admin_id', Auth::user()->id);
                return redirect()->intended('backend');
            }
            else{
                Auth::logout();
                return redirect()->route('ShowAdminLogin')->with('error', 'Not a admin user!');
            }        
        }
        return back()->withErrors(['email' => 'Invaild credentials.']);
    }

    public function showAdminRegister()
    {
        return view('frontend.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

      

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => 1, // New user is an admin
        ]);



        return redirect()->route('backend')->with('success', 'Admin user created successfully!');
    }



}
