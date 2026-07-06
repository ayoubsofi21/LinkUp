<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $posts = Post::withCount('comments')
    //          ->latest()
    //          ->get();
    //          return view('pages.feed',compcat('posts'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
        {
            $post = Post::find($id);

            //  return response()->json($post);
            return view("comments.create",compact('post'));
        }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request, $id)
            {
            $validated = $request->validate([
                'comment' => 'required|string|max:1000',
            ]);
            $post = Post::findOrFail($id);
            $post->comments()->create([
                'user_id' => auth()->id(),
                'comment' => $validated['comment'],
            ]);

            return redirect()->route('feed')
                ->with('success', 'Comment added successfully');
            }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
