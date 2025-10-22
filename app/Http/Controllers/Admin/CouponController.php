<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // Hiển thị danh sách mã
    public function index()
    {
        $coupons = Coupon::latest()->paginate(15);
        return view('admin.coupons.index', compact('coupons'));
    }

    // Hiển thị form tạo mới
    public function create()
    {
        return view('admin.coupons.create');
    }

    // Lưu mã mới vào database
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:50|unique:coupons',
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'starts_at' => 'nullable|date',
            'expires_at' => 'nullable|date',
            'usage_limit' => 'nullable|integer|min:1',
        ]);

        Coupon::create($validatedData);

        return redirect()->route('coupons.index')
            ->with('success', 'Mã giảm giá đã được tạo thành công.');
    }

    // Hiển thị form chỉnh sửa
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    // Cập nhật mã trong database
    public function update(Request $request, Coupon $coupon)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|max:50|unique:coupons,code,' . $coupon->id,
            'type' => 'required|in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'starts_at' => 'nullable|date',
            'expires_at' => 'nullable|date',
            'usage_limit' => 'nullable|integer|min:1',
        ]);

        $coupon->update($validatedData);

        return redirect()->route('coupons.index')
            ->with('success', 'Mã giảm giá đã được cập nhật thành công.');
    }

    // Xóa mã
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupons.index')->with('success', 'Xóa mã giảm giá thành công!');
    }
}