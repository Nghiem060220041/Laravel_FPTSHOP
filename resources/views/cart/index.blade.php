@extends('layouts.app')

@section('title', 'Giỏ hàng')

@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-2xl md:text-3xl font-bold mb-6">Giỏ hàng của bạn</h1>
    
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    
    @if(session('warning'))
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded mb-6" role="alert">
            <span class="block sm:inline">{{ session('warning') }}</span>
        </div>
    @endif
    
    @if($cartItems->isEmpty())
        <div class="bg-white rounded-lg shadow-md p-6 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <h2 class="text-xl font-semibold mt-4">Giỏ hàng của bạn đang trống</h2>
            <p class="text-gray-600 mt-2 mb-6">Hãy thêm sản phẩm vào giỏ hàng để tiếp tục mua sắm</p>
            <a href="{{ route('home') }}" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-md transition">
                Tiếp tục mua sắm
            </a>
        </div>
    @else
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Danh sách sản phẩm trong giỏ hàng -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Sản phẩm
                                </th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Giá
                                </th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Số lượng
                                </th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Thành tiền
                                </th>
                                <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Thao tác
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($cartItems as $item)
                                <tr>
                                    <td class="px-4 py-4">
                                        <div class="flex items-center">
                                            <img src="{{ asset('storage/' . ($item->attributes->image ?? 'products/default.png')) }}" 
                                                 alt="{{ $item->name }}" 
                                                 class="w-16 h-16 object-cover mr-4">
                                            <div>
                                                <h3 class="font-medium text-gray-800">{{ $item->name }}</h3>
                                                @if($item->attributes->variant_name)
                                                    <p class="text-sm text-gray-600">{{ $item->attributes->variant_name }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        {{ number_format($item->price) }} VNĐ
                                    </td>
                                    <td class="px-4 py-4">
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="flex items-center justify-center">
                                            @csrf
                                            @method('PUT')
                                            <div class="flex border rounded-md">
                                                <button type="button" class="px-2 py-1 bg-gray-100 decrease-qty" data-id="{{ $item->id }}">-</button>
                                                <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-12 text-center border-0 focus:ring-0">
                                                <button type="button" class="px-2 py-1 bg-gray-100 increase-qty" data-id="{{ $item->id }}">+</button>
                                            </div>
                                            <button type="submit" class="ml-2 text-blue-600 hover:text-blue-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-4 py-4 text-center font-medium">
                                        {{ number_format($item->price * $item->quantity) }} VNĐ
                                    </td>
                                    <td class="px-4 py-4 text-center">
                                        <form action="{{ route('cart.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="flex justify-between mt-6">
                    <a href="{{ route('home') }}" class="flex items-center text-blue-600 hover:text-blue-800">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Tiếp tục mua sắm
                    </a>
                    
                    <a href="{{ route('cart.clear') }}" class="text-red-600 hover:text-red-800" onclick="return confirm('Bạn có chắc chắn muốn xóa toàn bộ giỏ hàng?')">
                        Xóa tất cả
                    </a>
                </div>
            </div>
            
            <!-- Thông tin tổng đơn hàng -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-lg font-semibold mb-4">Thông tin đơn hàng</h2>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex justify-between mb-2">
                            <span>Tạm tính</span>
                            <span>{{ number_format($total) }} VNĐ</span>
                        </div>
                        
                        <div class="flex justify-between mb-2">
                            <span>Phí vận chuyển</span>
                            <span>Miễn phí</span>
                        </div>
                        
                        <div class="flex justify-between font-semibold border-t border-gray-200 pt-4 mt-2">
                            <span>Tổng cộng</span>
                            <span class="text-red-600 text-xl">{{ number_format($total) }} VNĐ</span>
                        </div>
                    </div>
                    
                    <a href="{{ route('checkout.index') }}" class="block w-full bg-red-600 text-white text-center py-2 rounded-md mt-6 hover:bg-red-700 transition">
                        Tiến hành thanh toán
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Xử lý nút tăng/giảm số lượng
        const decreaseBtns = document.querySelectorAll('.decrease-qty');
        const increaseBtns = document.querySelectorAll('.increase-qty');
        
        decreaseBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input');
                let value = parseInt(input.value);
                
                if (value > 1) {
                    input.value = value - 1;
                }
            });
        });
        
        increaseBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input');
                let value = parseInt(input.value);
                
                input.value = value + 1;
            });
        });
    });
</script>
@endsection