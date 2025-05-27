<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(3);
        return view("backend.user.userlist", compact('users'));
    }

    public function create(){
        return view('backend.user.usercreate');
    }

    public function store(Request $request){
        $validate = validator($request->All(),[
            'name' => 'required|min:4',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function destroy($id){
        $user = User::find($id);

        if($user){
            $user->delete();
            return redirect()->route('user.index')->with('success', 'User deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'User not found.');
        }
    }
}
