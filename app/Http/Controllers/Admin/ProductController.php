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
        // Added 'variants' to eager load for the index page optimization
        $products = Product::with('category', 'variants')->latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            // Validation cho biến thể và thuộc tính
            'variants' => 'required|array|min:1', // Ít nhất phải có 1 biến thể
            'variants.*.name' => 'nullable|string|max:255', // Tên gợi nhớ không bắt buộc
            'variants.*.attributes' => 'required|array|min:1', // Mỗi biến thể phải có ít nhất 1 thuộc tính
            'variants.*.attributes.*.key' => 'required|string|max:255',
            'variants.*.attributes.*.value' => 'required|string|max:255',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.quantity' => 'required|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Tạo sản phẩm chính (không còn lưu giá, số lượng)
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image' => $imagePath,
            'slug' => Str::slug($validatedData['name']),
            'category_id' => $validatedData['category_id']
        ]);

        // Tạo các biến thể và xử lý attributes
        if ($request->has('variants')) {
            foreach ($request->variants as $variantData) {
                // Chuyển đổi mảng attributes key-value thành dạng JSON mong muốn
                $attributesArray = [];
                if (isset($variantData['attributes'])) {
                    foreach ($variantData['attributes'] as $attribute) {
                        if (!empty($attribute['key']) && !empty($attribute['value'])) {
                            $attributesArray[$attribute['key']] = $attribute['value'];
                        }
                    }
                }
                
                // Chỉ lưu biến thể nếu có đủ thông tin cơ bản và thuộc tính
                if (!empty($attributesArray) && isset($variantData['price']) && isset($variantData['quantity'])) {
                     $product->variants()->create([
                         'name' => $variantData['name'] ?? null, // Tên gợi nhớ có thể null
                         'attributes' => $attributesArray, // Lưu dưới dạng JSON
                         'price' => $variantData['price'],
                         'quantity' => $variantData['quantity'],
                     ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }


    public function update(Request $request, Product $product)
    {
         $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'variants' => 'required|array|min:1',
            'variants.*.name' => 'nullable|string|max:255',
            'variants.*.attributes' => 'required|array|min:1',
            'variants.*.attributes.*.key' => 'required|string|max:255',
            'variants.*.attributes.*.value' => 'required|string|max:255',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.quantity' => 'required|integer|min:0',
        ]);

        $updateData = [
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'slug' => Str::slug($validatedData['name']),
            'category_id' => $validatedData['category_id']
        ];

        // Xử lý upload ảnh mới
        if ($request->hasFile('image')) {
            if ($product->image) { Storage::disk('public')->delete($product->image); }
            $updateData['image'] = $request->file('image')->store('products', 'public');
        }

        // Cập nhật sản phẩm chính
        $product->update($updateData);

        // Xóa tất cả biến thể cũ
        $product->variants()->delete();

        // Thêm lại các biến thể mới từ form
        if ($request->has('variants')) {
             foreach ($request->variants as $variantData) {
                $attributesArray = [];
                if (isset($variantData['attributes'])) {
                    foreach ($variantData['attributes'] as $attribute) {
                         if (!empty($attribute['key']) && !empty($attribute['value'])) {
                            $attributesArray[$attribute['key']] = $attribute['value'];
                        }
                    }
                }
                 if (!empty($attributesArray) && isset($variantData['price']) && isset($variantData['quantity'])) {
                     $product->variants()->create([
                         'name' => $variantData['name'] ?? null,
                         'attributes' => $attributesArray,
                         'price' => $variantData['price'],
                         'quantity' => $variantData['quantity'],
                     ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }
}