@extends('layout.app')

@section('title', 'Trang chủ')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Sản phẩm Mới nhất</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        {{-- Kiểm tra biến tồn tại và có dữ liệu --}}
        @if(isset($latestProducts) && count($latestProducts) > 0)
            {{-- Vòng lặp để hiển thị sản phẩm --}}
            @foreach ($latestProducts as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    {{-- Giả sử có hình ảnh, sẽ làm ở bước sau --}}
                    <img src="https://via.placeholder.com/300x200" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="text-lg font-semibold truncate">{{ $product->name }}</h3>
                        <p class="text-red-500 font-bold mt-2">
                            {{ number_format($product->sale_price ?? $product->price, 0, ',', '.') }} ₫
                        </p>
                        <a href="{{ route('products.show', $product->slug) }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-span-full text-center py-10">
                <p class="text-gray-500">Chưa có sản phẩm nào.</p>
            </div>
        @endif
    </div>
@endsection