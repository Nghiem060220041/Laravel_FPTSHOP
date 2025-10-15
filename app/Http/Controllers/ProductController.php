<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($slug)
    {
        // Tìm sản phẩm theo slug, nếu không thấy sẽ báo lỗi 404
        $product = Product::where('slug', $slug)->firstOrFail();

        // Trả về view và truyền dữ liệu sản phẩm ra
        return view('products.show', compact('product'));
    }
    // Thêm hàm category() vào đây ở bước tiếp theo
}
