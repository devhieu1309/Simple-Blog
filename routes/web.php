<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
use App\Models\Post;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    $posts = Post::with('category', 'tags')->take(5)->latest()->get();

    $data = [
        'posts' => $posts
    ];
    return view('pages.home', $data);
})->name('home');

Route::get('post/{id}', [PostController::class, 'show'])->name('posts.show');
Route::get('post', [PostController::class, 'index'])->name('posts.index');
Route::view('about', 'pages.about')->name('about');



Route::group(['middleware' => 'auth', 'prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::view('/', 'dashboard')->name('dashboard');
    Route::resource('posts', Admin\PostController::class);
    Route::resource('categories', Admin\CategoryController::class);
    Route::resource('tags', Admin\TagController::class);
});

require __DIR__.'/auth.php';



