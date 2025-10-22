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
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.quantity' => 'required|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Tạo sản phẩm chính
        $product = Product::create([
            'name' => $validatedData['name'],
            'description' => $validatedData['description'],
            'image' => $imagePath,
            'slug' => Str::slug($validatedData['name']),
            'category_id' => $validatedData['category_id']
        ]);

        // Tạo các biến thể
        if ($request->has('variants')) {
            foreach ($request->variants as $variantData) {
                $product->variants()->create([
                    'name' => $variantData['name'] ?? null,
                    'price' => $variantData['price'],
                    'quantity' => $variantData['quantity'],
                ]);
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
                if (isset($variantData['price']) && isset($variantData['quantity'])) {
                    $product->variants()->create([
                        'name' => $variantData['name'] ?? null,
                        'price' => $variantData['price'],
                        'quantity' => $variantData['quantity'],
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return redirect()->route('products.index')
                ->with('success', 'Sản phẩm đã được xóa thành công.')
                ->with('deleted', true);  // Thêm flag này để hiển thị modal
        } catch (\Exception $e) {
            return redirect()->route('products.index')
                ->with('error', 'Không thể xóa sản phẩm. ' . $e->getMessage());
        }
    }
}