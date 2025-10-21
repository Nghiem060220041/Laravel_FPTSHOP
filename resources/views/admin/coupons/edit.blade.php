@extends('layouts.admin')
@section('title', 'Sửa Mã Giảm Giá')
@section('header_title', 'Sửa Mã Giảm Giá: ' . $coupon->code)

@section('content')
    @if ($errors->any())
        <x-admin.alert type="error" class="mb-5">
            <strong>Có lỗi xảy ra!</strong>
        </x-admin.alert>
    @endif

    <x-admin.card>
        <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <x-admin.input
                label="Mã (Code)"
                name="code"
                value="{{ old('code', $coupon->code) }}"
                required
            />
            
            <x-admin.select
                label="Loại Giảm Giá"
                name="type"
                required
                :options="['fixed' => 'Giảm theo Số Tiền (VNĐ)', 'percent' => 'Giảm theo Phần Trăm (%)']"
                :selected="old('type', $coupon->type)"
            />
            
            <x-admin.input
                type="number"
                label="Giá Trị"
                name="value"
                value="{{ old('value', $coupon->value) }}"
                required
            />
            
            <x-admin.input
                type="date"
                label="Ngày Hết Hạn (Bỏ trống nếu không hết hạn)"
                name="expires_at"
                value="{{ old('expires_at', $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : '') }}"
            />
            
            <x-admin.input
                type="number"
                label="Giới Hạn Lượt Dùng (Bỏ trống nếu không giới hạn)"
                name="usage_limit"
                value="{{ old('usage_limit', $coupon->usage_limit) }}"
            />
            
            <div class="mt-6">
                <x-admin.button type="submit" color="success">
                    Cập Nhật
                </x-admin.button>
            </div>
        </form>
    </x-admin.card>
@endsection