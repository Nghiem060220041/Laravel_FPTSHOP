<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB facade
use Illuminate\Support\Facades\Auth; // Import Auth
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        // Nếu giỏ hàng trống, chuyển về trang chủ
        if (Cart::isEmpty()) {
            return redirect()->route('home')->with('error', 'Giỏ hàng của bạn đang trống!');
        }
        return view('checkout.index');
    }

    public function success()
    {
        if (!session('order_id')) {
            return redirect()->route('home');
        }
        return view('checkout.success');
    }

    public function store(Request $request)
    {
        // 1. Validate dữ liệu
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string|max:1000',
            'payment_method' => 'required|string|in:cod', // Chỉ chấp nhận 'cod'
        ]);

        // Nếu giỏ hàng trống, không xử lý
        if (Cart::isEmpty()) {
            return redirect()->route('home')->with('error', 'Giỏ hàng của bạn đang trống!');
        }

        try {
            // 2. Bắt đầu một Database Transaction
            DB::beginTransaction();

            // 3. Tạo đơn hàng (Order)
            $order = Order::create([
                'user_id' => Auth::id(), // Lấy user ID đang đăng nhập
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'customer_address' => $request->customer_address,
                'notes' => $request->notes,
                'total_amount' => Cart::getTotal(),
                'status' => 'pending', // Trạng thái ban đầu
            ]);

            // 4. Lấy các sản phẩm trong giỏ hàng và lưu vào (Order Items)
            $cartItems = Cart::getContent();
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
                
                // (Tùy chọn nâng cao: Trừ tồn kho sản phẩm ở đây)
                // Product::find($item->id)->decrement('quantity', $item->quantity);
            }

            // 5. Tạo bản ghi thanh toán (Payment)
            Payment::create([
                'order_id' => $order->id,
                'method' => $request->payment_method,
                'amount' => Cart::getTotal(),
                'status' => 'pending', // Vì là COD nên cũng 'pending'
            ]);

            // 6. Nếu mọi thứ thành công, commit transaction
            DB::commit();

            // 7. Xóa giỏ hàng
            Cart::clear();

            // 8. Chuyển hướng đến trang thành công
            return redirect()->route('checkout.success')->with('order_id', $order->id);

        } catch (\Exception $e) {
            // 9. Nếu có lỗi, rollback transaction
            DB::rollBack();

            // Ghi log lỗi (quan trọng)
            // Log::error('Lỗi khi đặt hàng: ' . $e->getMessage());

            // Và trả về thông báo lỗi
            return back()->with('error', 'Đã có lỗi xảy ra khi xử lý đơn hàng của bạn. Vui lòng thử lại.');
        }
    }
}
