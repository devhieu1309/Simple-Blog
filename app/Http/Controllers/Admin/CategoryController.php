<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryFormRequest;
use App\Http\Requests\UpdateCategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        $data = [
            'categories' => $categories,
        ];

        return view('admin.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryFormRequest $request)
    {
        $data = $request->all();
        Category::create($data);
        return redirect()->route('admin.categories.index')->with('success', 'Thêm mới danh mục thành công.');
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
        $category = Category::find($id);

        $data = [
            'category' => $category,
        ];

        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryFormRequest $request, string $id)
    {
        $data = $request->all();
        $category = Category::find($id);
        $category->update($data);
        return redirect()->route('admin.categories.index')->with('success', 'Cập nhật danh mục thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Xóa danh mục ' . $category->name . ' thành công.');
    }
}
