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
    public function store(StoreCommentRequest $request, $id)
        {
            $validated = $request->validated();

            $post = Post::findOrFail($id);

            Comment::create([
                'comment' => $validated['comment'],
                'post_id' => $post->id,
                'user_id' => auth()->id(),
            ]);

            return redirect('/feed')->with('success', 'Comment added successfully');
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
        if($comment->user_id !=auth()->id()){
            abort('403');
        }
        $comment->delete();
        return redirect()->route('feed')->with('success',"deleted with successfull");
    }
}
