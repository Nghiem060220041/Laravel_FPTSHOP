@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="container mx-auto py-8 px-4">
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Phần hình ảnh sản phẩm -->
        <div class="w-full md:w-2/5">
            <div class="bg-white p-4 rounded-lg shadow-md">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-auto object-cover">
                @else
                    <div class="w-full h-[300px] bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">Không có hình ảnh</span>
                    </div>
                @endif
                
                <!-- Hình ảnh khác nếu có -->
                @if($product->images && $product->images->count() > 0)
                    <div class="grid grid-cols-4 gap-2 mt-4">
                        @foreach($product->images as $image)
                            <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $product->name }}" class="w-full h-20 object-cover cursor-pointer rounded border hover:border-blue-500">
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        
        <!-- Phần thông tin sản phẩm -->
        <div class="w-full md:w-3/5">
            <h1 class="text-2xl md:text-3xl font-bold mb-2">{{ $product->name }}</h1>
            
            @if($product->category)
                <div class="mb-4">
                    <span class="text-sm text-gray-500">Danh mục:</span>
                    <a href="{{ route('categories.show', $product->category->slug ?? 1) }}" class="text-blue-500 ml-1">{{ $product->category->name }}</a>
                </div>
            @endif
            
            <!-- Phần giá và biến thể -->
            <div class="mt-6">
                @if($product->variants && $product->variants->count() > 0)
                    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                        <!-- Giá -->
                        <div class="mb-4">
                            <span class="text-sm text-gray-600">Giá từ:</span>
                            <span class="text-2xl font-bold text-red-600 ml-2">
                                {{ number_format($product->variants->min('price')) }} VNĐ
                            </span>
                            
                            @php
                                $maxPrice = $product->variants->max('price');
                                $minPrice = $product->variants->min('price');
                            @endphp
                            
                            @if($maxPrice > $minPrice)
                                <span class="text-gray-500 ml-2">- {{ number_format($maxPrice) }} VNĐ</span>
                            @endif
                        </div>
                        
                        <!-- Form thêm vào giỏ hàng -->
                        <form action="{{ route('cart.store') }}" method="POST" class="mt-6">
                            @csrf
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold mb-2">Chọn cấu hình:</h3>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-2" id="variants-container">
                                    @foreach($product->variants as $variant)
                                        <div class="border rounded-md p-3 cursor-pointer hover:border-blue-500 hover:bg-blue-50 transition-colors
                                            {{ $loop->first ? 'bg-blue-50 border-blue-500 selected-variant' : '' }}"
                                            data-variant-id="{{ $variant->id }}"
                                            data-price="{{ $variant->price }}"
                                            data-quantity="{{ $variant->quantity }}">
                                            @if($variant->name)
                                                <p class="font-medium">{{ $variant->name }}</p>
                                            @endif
                                            <p class="text-red-600 font-semibold">{{ number_format($variant->price) }} VNĐ</p>
                                            <p class="text-sm text-gray-600">Kho: {{ $variant->quantity }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <input type="hidden" name="variant_id" id="selected-variant-id" value="{{ $product->variants->first()->id }}">
                            </div>
                            
                            <div class="flex items-center gap-4">
                                <div class="flex border rounded-md">
                                    <button type="button" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 decrease-qty">-</button>
                                    <input type="number" name="quantity" value="1" min="1" max="10" class="w-12 text-center">
                                    <button type="button" class="px-3 py-2 bg-gray-100 hover:bg-gray-200 increase-qty">+</button>
                                </div>
                                
                                <button type="submit" class="bg-red-600 hover:bg-red-700 text-white rounded-md px-6 py-2 flex-grow">
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
                        </form>
                    </div>
                @endif
                
                <!-- Mô tả sản phẩm -->
                <div class="mt-8">
                    <h3 class="text-xl font-semibold mb-4">Mô tả sản phẩm</h3>
                    <div class="prose max-w-none">
                        {!! $product->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Sản phẩm liên quan (nếu có) -->
    @if(isset($relatedProducts) && $relatedProducts->count() > 0)
    <!-- Hiển thị sản phẩm liên quan -->
    @endif
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Xử lý tăng/giảm số lượng
        const quantityInput = document.querySelector('input[name="quantity"]');
        const decreaseBtn = document.querySelector('.decrease-qty');
        const increaseBtn = document.querySelector('.increase-qty');
        
        decreaseBtn.addEventListener('click', function() {
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        });
        
        increaseBtn.addEventListener('click', function() {
            if (quantityInput.value < 10) {
                quantityInput.value = parseInt(quantityInput.value) + 1;
            }
        });
        
        // Xử lý chọn biến thể
        const variantItems = document.querySelectorAll('#variants-container > div');
        const variantIdInput = document.getElementById('selected-variant-id');
        
        variantItems.forEach(item => {
            item.addEventListener('click', function() {
                // Bỏ chọn tất cả
                variantItems.forEach(v => {
                    v.classList.remove('bg-blue-50', 'border-blue-500', 'selected-variant');
                });
                
                // Chọn biến thể hiện tại
                this.classList.add('bg-blue-50', 'border-blue-500', 'selected-variant');
                
                // Cập nhật variant_id trong form
                const variantId = this.dataset.variantId;
                if (variantId) {
                    variantIdInput.value = variantId;
                }
                
                // Cập nhật số lượng tối đa có thể đặt
                const variantQuantity = parseInt(this.dataset.quantity);
                quantityInput.max = variantQuantity < 10 ? variantQuantity : 10;
                
                // Đảm bảo số lượng hiện tại không vượt quá tồn kho
                if (parseInt(quantityInput.value) > variantQuantity) {
                    quantityInput.value = variantQuantity;
                }
            });
        });
    });
</script>
@endsection