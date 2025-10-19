@extends('layouts.app')

@section('title', 'Giỏ hàng')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Giỏ hàng của bạn</h1>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    
    @if($cart->items->count() > 0)
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sản phẩm</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Đơn giá</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Số lượng</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thành tiền</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($cart->items as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="h-16 w-16 flex-shrink-0">
                                        @if($item->product->images->first())
                                            <img class="h-16 w-16 object-cover" src="{{ $item->product->images->first()->image_url }}" alt="{{ $item->product->name }}">
                                        @else
                                            <img class="h-16 w-16 object-cover" src="https://via.placeholder.com/150" alt="{{ $item->product->name }}">
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $item->product->name }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ number_format($item->product->price, 0, ',', '.') }} đ</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 border rounded py-1 px-2">
                                    <button type="submit" class="ml-2 text-sm text-blue-600 hover:text-blue-800">Cập nhật</button>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }} đ</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="p-6 bg-gray-50">
                <div class="flex justify-between items-center">
                    <div>
                        <span class="text-lg font-bold">Tổng tiền:</span>
                        <span class="text-xl text-red-600 font-bold ml-2">{{ number_format($total, 0, ',', '.') }} đ</span>
                    </div>
                    <div class="flex space-x-4">
                        <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded">
                                Xóa giỏ hàng
                            </button>
                        </form>
                        <a href="{{ route('checkout') }}" class="bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded">
                            Tiến hành thanh toán
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-16">
            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            <h2 class="mt-4 text-lg font-medium text-gray-900">Giỏ hàng của bạn đang trống</h2>
            <p class="mt-2 text-gray-500">Hãy thêm sản phẩm vào giỏ hàng để tiến hành mua sắm.</p>
            <a href="{{ url('/') }}" class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">
                Tiếp tục mua sắm
            </a>
        </div>
    @endif
</div>
@endsection