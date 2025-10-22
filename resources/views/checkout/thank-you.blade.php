@extends('layouts.app')

@section('title', 'Đặt hàng thành công')

@section('content')
<div class="container mx-auto py-8 px-4">
    <div class="bg-white rounded-lg shadow-md p-6 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        
        <h1 class="text-2xl font-bold mt-4">Đặt hàng thành công!</h1>
        <p class="text-gray-600 mt-2">Cảm ơn bạn đã mua hàng tại FPT Shop</p>
        
        <div class="text-left mt-8">
            <h2 class="font-semibold text-lg">Thông tin đơn hàng #{{ $order->order_number }}</h2>
            
            <div class="grid md:grid-cols-2 gap-4 mt-4">
                <div>
                    <h3 class="font-medium">Thông tin khách hàng</h3>
                    <p>{{ $order->shipping_name }}</p>
                    <p>{{ $order->shipping_email }}</p>
                    <p>{{ $order->shipping_phone }}</p>
                    <p>{{ $order->shipping_address }}, {{ $order->shipping_city }}</p>
                </div>
                
                <div>
                    <h3 class="font-medium">Thông tin thanh toán</h3>
                    <p>Phương thức: {{ $order->payment_method == 'cod' ? 'Thanh toán khi nhận hàng' : 'Chuyển khoản ngân hàng' }}</p>
                    <p>Trạng thái: {{ $order->payment_status == 'pending' ? 'Chưa thanh toán' : 'Đã thanh toán' }}</p>
                    <p>Tổng tiền: {{ number_format($order->total_amount) }} VNĐ</p>
                </div>
            </div>
            
            <div class="mt-8">
                <h3 class="font-medium">Danh sách sản phẩm</h3>
                
                <div class="mt-2 overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left">Sản phẩm</th>
                                <th class="px-4 py-2 text-center">Giá</th>
                                <th class="px-4 py-2 text-center">Số lượng</th>
                                <th class="px-4 py-2 text-center">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($order->items as $item)
                                <tr>
                                    <td class="px-4 py-2">
                                        <div class="flex items-center">
                                            @if($item->product && $item->product->image)
                                                <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product->name }}" class="w-12 h-12 object-cover mr-4">
                                            @endif
                                            <div>
                                                <h4 class="font-medium">{{ $item->product ? $item->product->name : 'Sản phẩm đã bị xóa' }}</h4>
                                                @if($item->variant)
                                                    <p class="text-sm text-gray-500">{{ $item->variant->name }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 text-center">{{ number_format($item->price) }} VNĐ</td>
                                    <td class="px-4 py-2 text-center">{{ $item->quantity }}</td>
                                    <td class="px-4 py-2 text-center">{{ number_format($item->total) }} VNĐ</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="mt-8">
            <a href="{{ route('home') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md">
                Tiếp tục mua sắm
            </a>
        </div>
    </div>
</div>
@endsection