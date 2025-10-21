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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // MODIFICATION: Added 'unique:products,name' to ensure the product name is unique
            'name' => 'required|string|max:255|unique:products,name',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'variants' => 'nullable|array',
            'variants.*.name' => 'required_with:variants|string|max:255',
            'variants.*.price' => 'required_with:variants|numeric|min:0',
            'variants.*.quantity' => 'required_with:variants|integer|min:0',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        // Create the main product
        $product = Product::create([
            'name' => $validatedData['name'],
            'price' => $request->price ?? 0,
            'description' => $validatedData['description'],
            'image' => $imagePath,
            'slug' => Str::slug($validatedData['name']),
            'category_id' => $validatedData['category_id']
        ]);

        // Create variants
        if ($request->has('variants')) {
            foreach ($request->variants as $variantData) {
                if (!empty($variantData['name']) && isset($variantData['price']) && isset($variantData['quantity'])) {
                    $product->variants()->create($variantData);
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công!');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $product->load('variants');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            // MODIFICATION: Added unique rule but ignoring the current product ID
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'variants' => 'nullable|array',
            'variants.*.name' => 'required_with:variants|string|max:255',
            'variants.*.price' => 'required_with:variants|numeric|min:0',
            'variants.*.quantity' => 'required_with:variants|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validatedData['image'] = $request->file('image')->store('products', 'public');
        }
        
        // Add slug to the data for updating
        $validatedData['slug'] = Str::slug($validatedData['name']);

        $product->update($validatedData);

        $product->variants()->delete();

        if ($request->has('variants')) {
            foreach ($request->variants as $variantData) {
                if (!empty($variantData['name']) && isset($variantData['price']) && isset($variantData['quantity'])) {
                    $product->variants()->create($variantData);
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
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công!');
    }
}