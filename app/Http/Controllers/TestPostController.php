<?php

namespace App\Http\Controllers;

use App\Models\TestPost;
use Illuminate\Http\Request;

class TestPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=TestPost::latest()->get();
        return view("pages.feed",compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate=$request->validate(
            ["description"=>'required|min:5']
        );
        TestPost::create($validate) ;       
        return redirect()->back()->with('success',"post created with successfull");
    }

    /**
     * Display the specified resource.
     */
    public function show(TestPost $testPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestPost $testPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TestPost $testPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestPost $testPost)
    {
        //
    }
}
