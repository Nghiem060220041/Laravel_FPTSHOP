@extends('layout.app')

@section('title', $product->name)

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div>
                 <img src="https://via.placeholder.com/600x400" alt="{{ $product->name }}" class="w-full rounded-lg">
            </div>

            <div>
                <h1 class="text-4xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                <div class="text-3xl text-red-500 font-bold mb-6">
                    {{ number_format($product->sale_price ?? $product->price, 0, ',', '.') }} ₫
                </div>
                <div class="mb-6">
                    <span class="font-semibold">Số lượng trong kho:</span> {{ $product->quantity }}
                </div>
                <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-6">
                    @csrf
                    <div class="flex items-center mb-4">
                        <label for="quantity" class="mr-2">Số lượng:</label>
                        <input type="number" id="quantity" name="quantity" value="1" min="1" class="w-16 border rounded py-1 px-2">
                    </div>
                    <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded">
                        Thêm vào giỏ hàng
                    </button>
                </form>
            </div>
        </div>

        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-4 border-b pb-2">Mô tả chi tiết sản phẩm</h2>
            <div class="prose max-w-none">
                {!! $product->content !!} {{-- Dùng {!! !!} để render HTML từ CSDL --}}
            </div>
        </div>
    </div>
@endsection