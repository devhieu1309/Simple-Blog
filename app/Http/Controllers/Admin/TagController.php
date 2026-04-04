<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagFormRequest;
use App\Http\Requests\UpdateTagFormRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::paginate(8);
        $data = [
            'tags' => $tags
        ];
        return view('admin.tags.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTagFormRequest $request)
    {
        $tag = $request->all();
        Tag::create($tag);
        return redirect()->route('admin.tags.index')->with('success', 'Thêm thẻ mới thành công.');
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
        $tag = Tag::find($id);
        $data = [
            'tag' => $tag
        ];
        return view('admin.tags.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTagFormRequest $request, string $id)
    {
        $data = $request->all();
        $tag = Tag::find($id);
        $tag->update($data);
        return redirect()->route('admin.tags.index')->with('success', 'Cập nhật thẻ thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Xóa thẻ thành công.');
    }
}
