<div class="container mx-auto px-4 py-3 flex justify-between items-center">
    <div class="flex items-center">
        <a href="{{ url('/') }}" class="text-2xl font-bold text-red-600">FPTShop</a>
    </div>
    
    <div class="flex items-center space-x-4">
        <form action="{{ url('/search') }}" method="GET" class="relative">
            <input type="text" name="q" placeholder="Tìm kiếm sản phẩm..." 
                class="px-4 py-2 rounded-full border focus:outline-none focus:ring-2 focus:ring-red-500 w-80">
            <button type="submit" class="absolute right-3 top-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </form>
        
        <a href="{{ url('/cart') }}" class="flex items-center text-gray-700 hover:text-red-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
            <span class="ml-1">Giỏ hàng</span>
        </a>
        
        @auth
            <div class="relative group">
                <button class="flex items-center text-gray-700 hover:text-red-600">
                    {{ Auth::user()->name }}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                    <a href="{{ url('/profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Tài khoản của tôi</a>
                    <a href="{{ url('/orders') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đơn hàng của tôi</a>
                    <form method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Đăng xuất</button>
                    </form>
                </div>
            </div>
        @else
            <a href="{{ url('/login') }}" class="text-gray-700 hover:text-red-600">Đăng nhập</a>
            <a href="{{ url('/register') }}" class="text-gray-700 hover:text-red-600">Đăng ký</a>
        @endauth
    </div>
</div>

<nav class="bg-red-600 text-white">
    <div class="container mx-auto px-4">
        <ul class="flex space-x-6 py-3">
            {{-- Hiển thị danh mục sản phẩm --}}
            @isset($categories)
                @foreach($categories as $category)
                    <li>
                        <a href="{{ url('/categories/' . $category->slug) }}" class="hover:text-red-200">{{ $category->name }}</a>
                    </li>
                @endforeach
            @endisset
            <li><a href="{{ url('/promotions') }}" class="hover:text-red-200">Khuyến mãi</a></li>
            <li><a href="{{ url('/news') }}" class="hover:text-red-200">Tin tức</a></li>
        </ul>
    </div>
</nav>