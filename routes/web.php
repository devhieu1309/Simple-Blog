<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Models\Post;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    $posts = Post::latest()->limit(5)->get();
    $data = [
        'posts' => $posts
    ];
    return view('pages.home', $data);
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('post/{id}', [PostController::class, 'show'])->name('post.show');
Route::get('post', [PostController::class, 'index'])->name('post.index');

// Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function () {
//     Route::view('/', 'dashboard')->name('dashboard');
//     Route::resource('categories', Admin\CategoryController::class);
//     Route::resource('tags', Admin\TagController::class);
//     Route::resource('posts', Admin\PostController::class);
// });


Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::resource('posts', Admin\PostController::class);
    Route::resource('categories', Admin\CategoryController::class);
    Route::resource('tags', Admin\TagController::class);
});



