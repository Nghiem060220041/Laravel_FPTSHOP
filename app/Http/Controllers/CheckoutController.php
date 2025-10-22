<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductVariant;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    /**
     * Hiển thị form thanh toán
     */
    public function index()
    {
        if (Cart::isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        $cartItems = Cart::getContent();
        $total = Cart::getTotal();

        return view('checkout.index', compact('cartItems', 'total'));
    }

    /**
     * Xử lý đơn hàng
     */
    public function store(Request $request)
    {
        // Kiểm tra giỏ hàng có trống không
        if (Cart::isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng của bạn đang trống.');
        }

        // Validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'payment_method' => 'required|in:cod,bank_transfer',
            'notes' => 'nullable|string|max:1000',
        ]);

        // Khởi tạo transaction để đảm bảo tính nhất quán dữ liệu
        DB::beginTransaction();

        try {
            $cartItems = Cart::getContent();
            $cartTotal = Cart::getTotal();

            // Tạo đơn hàng mới
            $order = Order::create([
                'user_id' => Auth::id(),  // Nếu user đăng nhập
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                'status' => 'pending',
                'total_amount' => $cartTotal,
                'shipping_name' => $request->name,
                'shipping_email' => $request->email,
                'shipping_phone' => $request->phone,
                'shipping_address' => $request->address,
                'shipping_city' => $request->city,
                'notes' => $request->notes,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
            ]);

            $orderTotal = 0;

            // Thêm các sản phẩm trong giỏ hàng vào chi tiết đơn hàng
            foreach ($cartItems as $item) {
                $variant = ProductVariant::find($item->id);
                
                // Nếu không tìm thấy variant hoặc số lượng không đủ, rollback transaction
                if (!$variant || $variant->quantity < $item->quantity) {
                    DB::rollBack();
                    
                    $errorMessage = !$variant 
                        ? 'Sản phẩm không tồn tại: ' . $item->name 
                        : 'Sản phẩm ' . $item->name . ' không đủ số lượng trong kho.';
                        
                    return redirect()->route('cart.index')->with('error', $errorMessage);
                }
                
                // Tạo chi tiết đơn hàng
                $orderItem = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->attributes->product_id,
                    'product_variant_id' => $item->id,  // ID của variant chính là item id trong giỏ hàng
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total' => $item->price * $item->quantity,
                ]);
                
                // Trừ tồn kho
                $variant->decrement('quantity', $item->quantity);
                
                // Cộng dồn vào tổng đơn hàng
                $orderTotal += $orderItem->total;
            }
            
            // Cập nhật lại tổng tiền thực tế của đơn hàng
            $order->update(['total_amount' => $orderTotal]);
            
            // Commit transaction
            DB::commit();
            
            // Xóa giỏ hàng
            Cart::clear();
            
            // Chuyển hướng đến trang cảm ơn
            return redirect()->route('checkout.thank-you', $order->id)->with('success', 'Đặt hàng thành công!');
            
        } catch (\Exception $e) {
            // Rollback transaction nếu có lỗi
            DB::rollBack();
            
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xử lý đơn hàng: ' . $e->getMessage());
        }
    }

    /**
     * Hiển thị trang cảm ơn sau khi đặt hàng thành công
     */
    public function thankYou($orderId)
    {
        $order = Order::with(['items.product', 'items.variant'])->findOrFail($orderId);
        
        return view('checkout.thank-you', compact('order'));
    }
}
