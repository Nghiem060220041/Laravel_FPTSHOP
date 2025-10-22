<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Hiển thị trang giỏ hàng
     */
    public function index()
    {
        $cartItems = Cart::getContent();
        $total = Cart::getTotal();

        return view('cart.index', compact('cartItems', 'total'));
    }

    /**
     * Thêm sản phẩm vào giỏ hàng
     */
    public function store(Request $request)
    {
        $request->validate([
            'variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            // Lấy thông tin biến thể sản phẩm kèm theo sản phẩm
            $variant = ProductVariant::with('product')->findOrFail($request->variant_id);
            $product = $variant->product;

            // Kiểm tra tồn kho
            if ($variant->quantity < $request->quantity) {
                return redirect()->back()->with('error', 'Số lượng sản phẩm trong kho không đủ.');
            }

            // Tạo tên hiển thị cho item giỏ hàng
            $itemName = $product->name;
            if ($variant->name) {
                $itemName .= ' - ' . $variant->name;
            }

            // Lấy URL ảnh
            $imageUrl = $product->image ?? 'products/default.png';

            // Thêm vào giỏ hàng
            Cart::add([
                'id' => $variant->id,
                'name' => $itemName,
                'price' => $variant->price,
                'quantity' => $request->quantity,
                'attributes' => [
                    'product_id' => $product->id,
                    'image' => $imageUrl,
                    'slug' => $product->slug,
                    'variant_name' => $variant->name,
                ]
            ]);

            return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm sản phẩm vào giỏ hàng: ' . $e->getMessage());
        }
    }

    /**
     * Cập nhật số lượng sản phẩm trong giỏ hàng
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        try {
            // Kiểm tra biến thể tồn tại
            $variant = ProductVariant::find($id);
            
            if (!$variant) {
                // Nếu biến thể không tồn tại nữa, xóa khỏi giỏ hàng
                Cart::remove($id);
                return redirect()->back()->with('warning', 'Sản phẩm không còn tồn tại và đã bị xóa khỏi giỏ hàng.');
            }

            // Kiểm tra tồn kho
            if ($variant->quantity < $request->quantity) {
                return redirect()->back()->with('error', 'Số lượng sản phẩm trong kho không đủ.');
            }

            // Cập nhật số lượng
            Cart::update($id, [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ]
            ]);

            return redirect()->back()->with('success', 'Giỏ hàng đã được cập nhật.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật giỏ hàng: ' . $e->getMessage());
        }
    }

    /**
     * Xóa sản phẩm khỏi giỏ hàng
     */
    public function destroy($id)
    {
        try {
            Cart::remove($id);
            return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng: ' . $e->getMessage());
        }
    }

    /**
     * Xóa toàn bộ giỏ hàng
     */
    public function clear()
    {
        Cart::clear();
        return redirect()->back()->with('success', 'Giỏ hàng đã được xóa.');
    }
}
