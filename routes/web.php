<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestPostController;

Route::get('/',[TestPostController::class,'index']);
Route::post('/posts/store',[TestPostController::class,'store'])->name('posts.store');
// Route::resource('posts',PostController::class);