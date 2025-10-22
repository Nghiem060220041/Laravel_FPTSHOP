@extends('layouts.admin')
@section('title', 'Thêm Mã Giảm Giá')
@section('header_title', 'Thêm Mã Giảm Giá Mới')

@section('content')
    @if ($errors->any())
        <x-admin.alert type="error" class="mb-5">
            <strong>Có lỗi xảy ra!</strong>
        </x-admin.alert>
    @endif

    <x-admin.card>
        <form action="{{ route('coupons.store') }}" method="POST">
            @csrf
            
            <x-admin.input
                label="Mã (Code)"
                name="code"
                value="{{ old('code') }}"
                required
            />
            
            <x-admin.select
                label="Loại Giảm Giá"
                name="type"
                required
                :options="['fixed' => 'Giảm theo Số Tiền (VNĐ)', 'percent' => 'Giảm theo Phần Trăm (%)']"
                :selected="old('type')"
            />
            
            <x-admin.input
                type="number"
                label="Giá Trị"
                name="value"
                value="{{ old('value') }}"
                required
            />
            
            <x-admin.input
                type="date"
                label="Ngày Bắt Đầu (Bỏ trống nếu áp dụng ngay)"
                name="starts_at"
                value="{{ old('starts_at') }}"
            />
            
            <x-admin.input
                type="date"
                label="Ngày Hết Hạn (Bỏ trống nếu không hết hạn)"
                name="expires_at"
                value="{{ old('expires_at') }}"
            />
            
            <x-admin.input
                type="number"
                label="Giới Hạn Lượt Dùng (Bỏ trống nếu không giới hạn)"
                name="usage_limit"
                value="{{ old('usage_limit') }}"
            />
            
            <div class="mt-6">
                <x-admin.button type="submit" color="primary">
                    Lưu Mã Giảm Giá
                </x-admin.button>
            </div>
        </form>
    </x-admin.card>
@endsection