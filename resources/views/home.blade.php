@extends('layouts.app')

@section('title', 'Trang chủ - FPT Shop')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <section class="mb-8">
            <div class="swiper my-banner-slider">
                <div class="swiper-wrapper">
                    <a href="#" class="swiper-slide slide-item">
                        <img src="https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/desk_header_bg_2c3c632836.png" 
                             class="slide-bg" alt="Background S25">
                        <img src="https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/desk_header_40b69f439a.png" 
                             class="slide-content" alt="Banner S25 FE">
                    </a>

                    <a href="#" class="swiper-slide slide-item">
                        <img src="https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/desk_header_bg_fd2212e503.png" 
                             class="slide-bg" alt="Background Nóc Nhà">
                        <img src="https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/desk_header_b2dad28ac4.png" 
                             class="slide-content" alt="Banner Nóc Nhà">
                    </a>
                    
                    <a href="#" class="swiper-slide slide-item">
                        <img src="https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/desk_header_bg_3018b529ab.png" 
                             class="slide-bg" alt="Background Điện máy">
                        <img src="https://cdn2.fptshop.com.vn/unsafe/1920x0/filters:format(webp):quality(75)/desk_header_c79a90ba94.png" 
                             class="slide-content" alt="Banner Điện máy">
                    </a>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
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