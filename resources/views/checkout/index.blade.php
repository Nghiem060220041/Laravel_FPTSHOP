@extends('layouts.app')

@section('title', 'Thanh toán')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Thông tin Thanh toán</h1>
    <form action="{{ route('checkout.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                <h2 class="text-2xl font-semibold mb-4">Thông tin giao hàng</h2>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <div class="mb-4">
                        <label for="customer_name" class="block text-sm font-medium text-gray-700">Họ và tên *</label>
                        <input type="text" id="customer_name" name="customer_name" value="{{ auth()->user()->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="customer_email" class="block text-sm font-medium text-gray-700">Email *</label>
                        <input type="email" id="customer_email" name="customer_email" value="{{ auth()->user()->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="customer_phone" class="block text-sm font-medium text-gray-700">Số điện thoại *</label>
                        <input type="tel" id="customer_phone" name="customer_phone" value="{{ auth()->user()->phone ?? '' }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>
                    <div class="mb-4">
                        <label for="customer_address" class="block text-sm font-medium text-gray-700">Địa chỉ *</label>
                        <textarea id="customer_address" name="customer_address" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>{{ auth()->user()->address ?? '' }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="notes" class="block text-sm font-medium text-gray-700">Ghi chú (tùy chọn)</label>
                        <textarea id="notes" name="notes" rows="2" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                </div>
            </div>

            <div>
                <h2 class="text-2xl font-semibold mb-4">Đơn hàng của bạn</h2>
                <div class="bg-white shadow-md rounded-lg p-6">
                    @foreach(Cart::getContent() as $item)
                        <div class="flex justify-between items-center border-b py-2">
                            <span class="text-gray-600">{{ $item->name }} (x{{ $item->quantity }})</span>
                            <span class="font-semibold">{{ number_format($item->getPriceSum(), 0, ',', '.') }} ₫</span>
                        </div>
                    @endforeach
                    <div class="flex justify-between items-center font-bold text-xl mt-4 pt-4 border-t">
                        <span>Tổng cộng:</span>
                        <span class="text-red-500">{{ number_format(Cart::getTotal(), 0, ',', '.') }} ₫</span>
                    </div>
                    <h3 class="text-lg font-semibold mt-6 mb-3">Phương thức thanh toán</h3>
                    <div class="space-y-2">
                        <div class="border rounded-md p-3">
                            <input type="radio" id="payment_cod" name="payment_method" value="cod" class="align-middle" checked>
                            <label for="payment_cod" class="ml-2 font-medium">Thanh toán khi nhận hàng (Ship COD)</label>
                        </div>
                        </div>
                    <button type="submit" class="mt-6 w-full bg-red-500 text-white font-bold py-3 px-6 rounded-lg hover:bg-red-600">
                        Hoàn tất Đặt hàng
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection