<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Http\Requests\Admin\EditPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'tags', 'user')->paginate(5);

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreatePostRequest $request)
    {
        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('posts', $filename, 'public');
        }

        $post = auth()->user()->posts()->create([
            'title' => $request->string('title'),
            'content' => $request->string('content'),
            'image' => $filename ?? null,
            'category_id' => $request->integer('category_id')
        ]);

        foreach ($request->input('tags') as $tag) {
            $post->tags()->attach($tag);
        }

        return redirect()->route('admin.posts.index')->with('success', 'Thêm bài viết mới thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.edit', [
            'post' => $post,
            'tags' => $tags,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditPostRequest $request, Post $post)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete('/posts/' . $post->image);
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('posts', $filename, 'public');
        }

        $post->update([
            'title' => $request->string('title'),
            'content' => $request->string('content'),
            'image' => $filename ?? null,
            'category_id' => $request->integer('category_id'),
        ]);

        $post->tags()->sync($request->input('tags'));

        return redirect()->route('admin.posts.index')->with('success', 'Cập nhật bài viết thành công.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post) {
        if($post->image){
            Storage::disk('public')->delete('/posts/' . $post->image);
        }

        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Xóa bài viết thành công.');
    }
}
