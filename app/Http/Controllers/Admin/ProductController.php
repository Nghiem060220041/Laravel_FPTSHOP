<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Dùng with('category') để lấy kèm thông tin danh mục
        $products = Product::with('category')->latest()->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Lấy tất cả các danh mục để hiển thị trong form
        $categories = Category::all(); 
        
        // Trả về view và truyền biến $categories qua
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validate dữ liệu gửi lên
        $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // Kiểm tra là ảnh, định dạng và kích thước
        ]);

        // 2. Xử lý upload hình ảnh (nếu có)
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Lưu ảnh vào thư mục public/storage/products
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // 3. Tạo sản phẩm mới
        Product::create([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
            'image' => $imagePath,
            'slug'=> Str::slug($validatedData['name']),
            'category_id' => $validatedData['category_id']
        ]);

        // 4. Chuyển hướng về trang danh sách sản phẩm với một thông báo thành công
        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');    
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
    public function edit(Product $product)
    {
        //
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // Xử lý slug
        $validatedData['slug'] = Str::slug($validatedData['name']);

        // Xử lý hình ảnh
        if ($request->hasFile('image')) {
            // 1. Xóa ảnh cũ nếu có
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            // 2. Tải ảnh mới lên và lấy đường dẫn
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }

        // Cập nhật sản phẩm
        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Xóa hình ảnh của sản phẩm khỏi storage
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        // Xóa sản phẩm khỏi database
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}
