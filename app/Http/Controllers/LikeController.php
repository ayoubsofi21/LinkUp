<?php

namespace App\Http\Controllers;
use App\Models\Post;
class LikeController extends Controller
{
    public function toggle($id)
{
    $post = Post::findOrFail($id);
    // dd($post);
    $liked=$post->likes()->where('user_id',auth()->id())->exists();
    $liked? $post->likes()->detach(auth()->id()): $post->likes()->attach(auth()->id());
    return back();
}
}