@extends('layouts.app')

@section('title', 'Thanh toán')

@section('content')
<div class="container mx-auto py-8 px-4">
    <h1 class="text-2xl md:text-3xl font-bold mb-6">Thanh toán</h1>
    
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif
    
    <form action="{{ route('checkout.store') }}" method="POST" class="flex flex-col lg:flex-row gap-8">
        @csrf
        
        <div class="lg:w-2/3">
            <!-- Thông tin khách hàng -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Thông tin giao hàng</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Họ và tên</label>
                        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name ?? '') }}" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email ?? '') }}" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Tỉnh/Thành phố</label>
                        <input type="text" name="city" id="city" value="{{ old('city') }}" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        @error('city')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ chi tiết</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                        @error('address')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="md:col-span-2">
                        <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Ghi chú (tùy chọn)</label>
                        <textarea name="notes" id="notes" rows="3" class="w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">{{ old('notes') }}</textarea>
                    </div>
                </div>
            </div>
            
            <!-- Phương thức thanh toán -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h2 class="text-lg font-semibold mb-4">Phương thức thanh toán</h2>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <input type="radio" name="payment_method" id="cod" value="cod" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" checked>
                        <label for="cod" class="ml-3 block text-sm font-medium text-gray-700">
                            Thanh toán khi nhận hàng (COD)
                        </label>
                    </div>
                    
                    <div class="flex items-center">
                        <input type="radio" name="payment_method" id="bank_transfer" value="bank_transfer" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                        <label for="bank_transfer" class="ml-3 block text-sm font-medium text-gray-700">
                            Chuyển khoản ngân hàng
                        </label>
                    </div>
                </div>
                
                <div id="bank_info" class="mt-4 p-4 bg-gray-50 rounded-md hidden">
                    <p class="font-medium">Thông tin tài khoản:</p>
                    <p>Ngân hàng: Vietcombank</p>
                    <p>Số tài khoản: 1234567890</p>
                    <p>Chủ tài khoản: FPT Shop</p>
                    <p>Nội dung chuyển khoản: [Họ tên] - [Số điện thoại]</p>
                </div>
            </div>
        </div>
        
        <!-- Thông tin đơn hàng -->
        <div class="lg:w-1/3">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-lg font-semibold mb-4">Thông tin đơn hàng</h2>
                
                <div class="space-y-4">
                    @foreach($cartItems as $item)
                        <div class="flex">
                            <img src="{{ asset('storage/' . ($item->attributes->image ?? 'products/default.png')) }}" alt="{{ $item->name }}" class="w-16 h-16 object-cover mr-4">
                            <div class="flex-1">
                                <h3 class="font-medium">{{ $item->name }}</h3>
                                <p class="text-gray-500 text-sm">Số lượng: {{ $item->quantity }}</p>
                                <p class="text-red-600 font-medium">{{ number_format($item->price) }} VNĐ</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="border-t border-gray-200 mt-6 pt-4">
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
                
                <button type="submit" class="block w-full bg-red-600 text-white text-center py-3 rounded-md mt-6 hover:bg-red-700 transition">
                    Đặt hàng
                </button>
                
                <a href="{{ route('cart.index') }}" class="block w-full text-center text-blue-600 hover:underline mt-4">
                    Quay lại giỏ hàng
                </a>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hiển thị thông tin ngân hàng khi chọn phương thức chuyển khoản
        const bankTransferRadio = document.getElementById('bank_transfer');
        const codRadio = document.getElementById('cod');
        const bankInfo = document.getElementById('bank_info');
        
        bankTransferRadio.addEventListener('change', function() {
            if (this.checked) {
                bankInfo.classList.remove('hidden');
            }
        });
        
        codRadio.addEventListener('change', function() {
            if (this.checked) {
                bankInfo.classList.add('hidden');
            }
        });
    });
</script>
@endsection