@extends('layouts.app')

@section('title', 'Trang chủ - FPT Shop')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <section class="mb-8">
            <div class="relative">
                <img src="{{ asset('images/banner/main-banner.jpg') }}" alt="Banner" class="w-full rounded-lg">
                <div class="absolute inset-0 flex items-center">
                    <div class="ml-16 max-w-xl">
                        <h2 class="text-4xl font-bold text-white mb-4">Khuyến mãi mùa hè</h2>
                        <p class="text-white text-lg mb-6">Giảm giá đến 50% cho nhiều sản phẩm công nghệ</p>
                        <a href="#" class="bg-red-600 hover:bg-red-700 text-white py-3 px-6 rounded-lg">Khám phá ngay</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-6">Sản phẩm nổi bật</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @if(isset($featuredProducts) && count($featuredProducts) > 0)
                    @foreach($featuredProducts as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform duration-300 hover:transform hover:scale-105">
                            <img src="{{ asset('images/products/placeholder.jpg') }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold mb-2 truncate">{{ $product->name }}</h3>
                                <div class="text-red-600 font-bold mb-2">{{ number_format($product->price, 0, ',', '.') }} ₫</div>
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center">
                                        <div class="flex text-yellow-400">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <span class="text-gray-500 text-sm ml-1">({{ random_int(10, 500) }})</span>
                                    </div>
                                    <a href="{{ url('/products/'.$product->slug) }}" class="text-blue-600 hover:underline text-sm">Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="col-span-4 text-center text-gray-500">Không có sản phẩm nào.</p>
                @endif
            </div>
        </section>

        <section class="mb-12">
            <h2 class="text-2xl font-bold mb-6">Sản phẩm mới nhất</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @if(isset($latestProducts) && count($latestProducts) > 0)
                    @foreach($latestProducts as $product)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <img src="{{ asset('images/products/placeholder.jpg') }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-semibold mb-2 truncate">{{ $product->name }}</h3>
                                <div class="text-red-600 font-bold mb-2">{{ number_format($product->price, 0, ',', '.') }} ₫</div>
                                <a href="{{ url('/products/'.$product->slug) }}" class="block text-center bg-blue-500 hover:bg-blue-600 text-white py-2 rounded">
                                    Xem chi tiết
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="col-span-4 text-center text-gray-500">Không có sản phẩm mới nào.</p>
                @endif
            </div>
        </section>
    </div>
@endsection