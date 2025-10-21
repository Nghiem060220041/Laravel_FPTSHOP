<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:categories',
            'parent_id' => 'nullable|exists:categories,id'
        ]);

        Category::create([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'parent_id' => $validatedData['parent_id'],
        ]);

        return redirect()->route('categories.index')->with('success', 'Thêm danh mục thành công!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // Laravel tự động tìm danh mục theo ID
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            // Tên phải là duy nhất, nhưng bỏ qua danh mục đang sửa
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update([
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['name']),
            'parent_id' => $validatedData['parent_id'],
        ]);

        return redirect()->route('categories.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        // Có thể thêm kiểm tra xem danh mục có sản phẩm nào không trước khi xóa
        // if ($category->products()->count() > 0) {
        //     return back()->with('error', 'Không thể xóa danh mục này vì vẫn còn sản phẩm.');
        // }
        
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công!');
    }
}