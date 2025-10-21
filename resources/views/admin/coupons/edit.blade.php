@extends('layouts.admin')
@section('title', 'Sửa Mã Giảm Giá')
@section('header_title', 'Sửa Mã Giảm Giá: ' . $coupon->code)

@section('content')
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">
            <strong>Có lỗi xảy ra!</strong>
        </div>
    @endif

    <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Mã (Code)</label>
            <input type="text" name="code" value="{{ old('code', $coupon->code) }}" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Loại Giảm Giá</label>
            <select name="type" required style="width: 100%; padding: 8px;">
                <option value="fixed" {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>Giảm theo Số Tiền (VNĐ)</option>
                <option value="percent" {{ old('type', $coupon->type) == 'percent' ? 'selected' : '' }}>Giảm theo Phần Trăm (%)</option>
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Giá Trị</label>
            <input type="number" name="value" value="{{ old('value', $coupon->value) }}" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Ngày Hết Hạn (Bỏ trống nếu không hết hạn)</label>
            <input type="date" name="expires_at" value="{{ old('expires_at', $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : '') }}" style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label style="font-weight: bold;">Giới Hạn Lượt Dùng (Bỏ trống nếu không giới hạn)</label>
            <input type="number" name="usage_limit" value="{{ old('usage_limit', $coupon->usage_limit) }}" style="width: 100%; padding: 8px;">
        </div>
        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px;">Cập Nhật</button>
    </form>
@endsection