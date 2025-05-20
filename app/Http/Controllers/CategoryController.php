<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Categories::all();
        // dd($category) ;
        return view('backend.category.Catlist', compact('categories'));

    }

    public function create(){
        return view('backend.category.Catcreate');
    }

    public function store(Request $request){
        $validate = validator($request->all(),[
            'categoryName' => 'required|min:3'
        ]);
        if($validate->fails()){
            return back() -> withErrors($validate);
        }

        $categories = new Categories();
        $categories->name = $request->categoryName;

        if($categories->save()){
            return redirect()->back()->with('success','Add Success');
            // return redirect()->back()->with('key','Value');
        }
        else{
            return view('error.500');
        }

        
    }

    public function edit($id){
            $categories = Categories::find($id);
            return view('backend.category.edit',compact('categories'));
    
    }

    public function update(Request $request, $id){
        $validate = validator($request->all(),[
            'categoryName' => 'required|min:3'
        ]);
        if($validate->fails()){
            return back() -> withErrors($validate);
        }

       

        $categories = Categories::where('id',$id)->first();
        if(isset($categories)){
            $categories -> update(['name' => $request -> categoryName]);
             return redirect()->back()->with('success','Add Success');
        } else{
            return view('error.500');
        }
        
    }

}
