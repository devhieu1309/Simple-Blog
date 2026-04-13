<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'tags')->latest()->simplePaginate(8);
        $data = [
            'posts' => $posts
        ];
        return view('posts.index', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with('category', 'tags', 'user')->findOrFail($id);
        $data = [
            'post' => $post
        ];
        return view('posts.show', $data);
    }
}
