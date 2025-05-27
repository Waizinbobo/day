<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Categories::paginate(4);
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
            return back()->withErrors($validate);
        }

        $categories = new Categories();
        $categories->name = $request->categoryName;

        if($categories->save()){
            return redirect()->back()->with('success','Add Success');
        } else {
            return view('error.500');
        }
    }

    public function edit($id){
        $categories = Categories::find($id);
        return view('backend.category.edit', compact('categories'));
    }

    public function update(Request $request, $id){
        $validate = validator($request->all(),[
            'categoryName' => 'required|min:3'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate);
        }

        $categories = Categories::find($id);

        if($categories){
            $categories->update(['name' => $request->categoryName]);
            return redirect()->back()->with('success','Update Success');
        } else {
            return view('error.500');
        }
    }

    public function destroy($id){
        $category = Categories::find($id);

        if($category){
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Category not found.');
        }
    }
}
