<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function getCart()
    {
        if (Auth::check()) {
            // Người dùng đã đăng nhập, lấy giỏ hàng theo user_id
            $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        } else {
            // Người dùng chưa đăng nhập, lấy giỏ hàng theo session_id
            $sessionId = Session::getId();
            $cart = Cart::firstOrCreate(['session_id' => $sessionId]);
        }
        
        return $cart;
    }
    
    public function addToCart(Product $product, $quantity = 1)
    {
        $cart = $this->getCart();
        
        // Kiểm tra xem sản phẩm đã có trong giỏ hàng chưa
        $cartItem = $cart->items()->where('product_id', $product->id)->first();
        
        if ($cartItem) {
            // Nếu đã có, tăng số lượng
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Nếu chưa có, tạo mới
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
        }
        
        return $cart;
    }
    
    public function updateQuantity($cartItemId, $quantity)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->quantity = $quantity;
        $cartItem->save();
        
        return $cartItem;
    }
    
    public function removeItem($cartItemId)
    {
        $cartItem = CartItem::findOrFail($cartItemId);
        $cartItem->delete();
    }
    
    public function clearCart()
    {
        $cart = $this->getCart();
        $cart->items()->delete();
        
        return $cart;
    }
    
    public function getTotal()
    {
        $cart = $this->getCart();
        $total = 0;
        
        foreach ($cart->items as $item) {
            $total += $item->product->price * $item->quantity;
        }
        
        return $total;
    }
    
    // Hàm chuyển giỏ hàng từ session sang user khi đăng nhập
    public function mergeCart()
    {
        if (!Auth::check()) {
            return;
        }
        
        $sessionId = Session::getId();
        $sessionCart = Cart::where('session_id', $sessionId)->first();
        
        if (!$sessionCart) {
            return;
        }
        
        $userCart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        
        // Chuyển các sản phẩm từ session cart sang user cart
        foreach ($sessionCart->items as $item) {
            $existingItem = $userCart->items()->where('product_id', $item->product_id)->first();
            
            if ($existingItem) {
                $existingItem->quantity += $item->quantity;
                $existingItem->save();
            } else {
                $userCart->items()->create([
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity
                ]);
            }
        }
        
        // Xóa session cart
        $sessionCart->items()->delete();
        $sessionCart->delete();
    }
}