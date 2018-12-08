<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Category;
use App\User;
class CategoriesController extends Controller
{

    public function index()
    {
        return view('admin.categories.index')->with('categories', Category::all());
    }
    public function scroll_text()
    {
        return view('admin.scroll.index')->with('scroll', Category::find(1));
    }
    public function scroll_text_update(Request $request)
    {
        $scroll = Category::find(1);
        // dd($request->name);
        $scroll->name = $request->name;
        $scroll->save();
        Session::flash('success', 'You Successfully Updated Scroll Text');
        return redirect(route('scroll'));
    }


    public function create()
    {
        return view('admin.categories.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'You Successfully Created a Catefory');
        return redirect()->route('categories');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category', $category);
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        Session::flash('success', 'You Successfully Updated a Catefory');
        return redirect(route('categories'));
    }


    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::flash('success', 'You Successfully Deleted a Catefory');
        return redirect(route('categories'));

    }

    
}
