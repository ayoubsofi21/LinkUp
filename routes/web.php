<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/feed', [PostController::class, 'index'])->name('feed');

    Route::post('/comments/create/{id}', [CommentController::class, 'create'])->name('comments.create');
    Route::post('/comments/store/{id}', [CommentController::class, 'store'])->name('comments.store');
  

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    


    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');

    Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');     
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

});

require __DIR__.'/auth.php';

