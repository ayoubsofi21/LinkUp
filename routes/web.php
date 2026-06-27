<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestPostController;
use App\Http\Controllers\CommentController;


Route::get('/',[PostController::class,'index']);

// Route::get('/',[PostController::class,'store'])->name('posts.store');
// Route::post('/posts/store',[TestPostController::class,'store'])->name('posts.store');
// Route::resource('posts',PostController::class);
// show the comment form for can add comment to a specific post
Route::post('/comments/create/{id}', [CommentController::class, 'create'])->name('comments.create');
Route::post('/comments/store/{id}', [CommentController::class, 'store'])->name('comments.store');

