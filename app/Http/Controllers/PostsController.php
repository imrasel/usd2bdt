<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Post;
use App\Category;
use App\Tag;

class PostsController extends Controller
{

    public function index()
    {
        return view('admin.posts.index')->with('posts', Post::all());
    }


    public function create()
    {
        $categories = Category::all();

        if($categories->count() == 0) {
            Session::flash('info', 'You must have some categories before attempting to create some post');
            return redirect()->back();
        }


        return view('admin.posts.create')->with('categories', $categories)->with('tags', Tag::all());
    }

    public function store(Request $request)
    {
        

        $this->validate($request, [
            'title' => 'required|max:255',
            'featured' => 'required|image',
            'content' => 'required|',
            'category_id' => 'required',
            'tags' => 'required'

        ]);

        $featured= $request->featured;

        $featured_new_name = time().$featured->getClientOriginalname();

        $featured->move('uploads/posts', $featured_new_name);



        $post = Post::create([
            'title' => $request->title,
            'content' =>$request->content,
            'featured' =>'uploads/posts/' . $featured_new_name,
            'category_id' =>$request->category_id,
            'slug' => str_slug($request->title)
        ]);

        $post->tags()->attach($request->tags);


        Session::flash('success', 'Post created Successfully');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')->with('post', $post)->with('categories', Category::all());
    }


    public function update(Request $request, $id)
    {
        

        $this->validate($request, [

            'title' =>'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);


        $post = Post::find($id);

        if ($request->hasFile('featured')) {

            $featured = $request->featured;
            $featured_new_name = time() . $featured->getClientOriginalname();

            $featured->move('uploads/posts', $featured_new_name);

            $post->featured = 'uploads/posts/'. $featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id =$request->category_id;
        $post->save();

        Session::flash('success', 'Post Updated Successfully');

        return redirect()->route('posts');

    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        Session::flash('success', 'The Post was just trashed');

        return redirect()->back();
    }


    public function trashed() {
        $posts = Post::onlyTrashed()->get();
        
        return view('admin.posts.trashed')->with('posts', $posts);
    }



    public function kill($id) {

        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('success', 'Post deleted Permanently.');
        return redirect()->back();

    }


    public function restore($id) {

        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();
        Session::flash('success', 'Post Restored Successfully');

        return redirect()->route('posts');
    }



}
