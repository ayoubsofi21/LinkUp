<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('pages.feed');
});
Route::resource('posts',PostController::class);