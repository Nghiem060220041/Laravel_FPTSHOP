<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        // Tìm sản phẩm theo slug
        $product = Product::where('slug', $slug)->first();
        
        // Kiểm tra sản phẩm tồn tại
        if (!$product) {
            abort(404, 'Không tìm thấy sản phẩm');
        }
        
        // Load các quan hệ cần thiết
        $product->load(['variants', 'category', 'images']);
        
        // Lấy sản phẩm liên quan
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->with('variants')
            ->take(5)
            ->get();
        
        return view('products.show', compact('product', 'relatedProducts'));
    }
}
