<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
       $categories=Category::all();

        return view('Admin.category',compact('categories'))->with('status','Category have been added with success');
    }
    public function store(Request $request)
    {
        $category =new Category();
        $category->name=$request->input('name');
        $category->save();

        return back()->with('status','category have been added with success');
    }

    public function delete($id)
    {

        $category=Category::findORFail($id);
        $category->delete();
        return back()->with('status','category have been delete with success');

    }
}
