<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts=Post::all();
        $posts = Post::withCount('comments')
             ->latest()
             ->get();
        return view("pages.feed",compact("posts"));
    }
     public function store(Request $request)
    {
        $validate=$request->validate(
            ["description"=>'required|min:5']
        );
        Post::create($validate) ;       
        return redirect()->back()->with('success',"post created with successfull");
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post=Post::findOrFail($id);
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index')->with('success','post deleted successfully !');

    }
}
