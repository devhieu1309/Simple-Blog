<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostFormRequest;
use App\Http\Requests\UpdatePostFormRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::latest()->paginate(5);
        $data = [
            'posts' => $post
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        $data = [
            'categories' => $categories,
            'tags' => $tags
        ];

        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostFormRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image = $request->file('image')->storeAs('posts', $request->file('image')->getClientOriginalName(), 'public');
        $post->category_id = $request->input('category_id');
        $post->user_id = Auth::id();
        $post->save();
        $post->tags()->sync($request->input('tags'));
        return redirect()->route('admin.posts.index')->with('success', 'Lưu mới bài viết thành công.');
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
    public function edit(string $id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $data = [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ];
        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostFormRequest $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        if ($request->hasFile('image')) {

            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $post->image = $request->file('image')->storeAs('posts', $request->file('image')->getClientOriginalName(), 'public');
        }
        $post->category_id = $request->input('category_id');
        $post->user_id = Auth::id();
        $post->save();

        $post->tags()->sync($request->input('tags'));

        return redirect()->route('admin.posts.index')->with('success', 'Cập nhật bài viết thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if($post->image && Storage::disk('public')->exists($post->image)){
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        DB::table('post_tag')->where('post_id', $post->id)->delete();
        return redirect()->route('admin.posts.index')->with('success', 'Xóa bài viết thành công.');
    }
}
