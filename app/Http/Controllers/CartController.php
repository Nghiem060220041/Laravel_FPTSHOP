<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    protected $cartService;
    
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }
    
    public function index()
    {
        $cart = $this->cartService->getCart();
        $total = $this->cartService->getTotal();
        
        return view('cart.index', compact('cart', 'total'));
    }
    
    public function add(Request $request, Product $product)
    {
        $quantity = $request->input('quantity', 1);
        $this->cartService->addToCart($product, $quantity);
        
        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng!');
    }
    
    public function update(Request $request, $id)
    {
        $quantity = $request->input('quantity');
        $this->cartService->updateQuantity($id, $quantity);
        
        return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được cập nhật!');
    }
    
    public function remove($id)
    {
        $this->cartService->removeItem($id);
        
        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng!');
    }
    
    public function clear()
    {
        $this->cartService->clearCart();
        
        return redirect()->route('cart.index')->with('success', 'Giỏ hàng đã được xóa!');
    }
}
