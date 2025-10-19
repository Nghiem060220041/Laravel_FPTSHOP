<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FPTShop')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        /* Ẩn dropdown menu ban đầu */
        .dropdown-menu {
            display: none;
        }
        
        /* Hiển thị khi hover hoặc có class show */
        .dropdown:hover .dropdown-menu,
        .dropdown-menu.show {
            display: block;
        }
        
        /* Thêm khoảng trống để di chuột xuống menu mà không bị mất */
        .dropdown-menu::before {
            content: "";
            display: block;
            position: absolute;
            top: -10px;
            left: 0;
            right: 0;
            height: 10px;
        }
    </style>
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow-md">
        @include('layouts.partials.header')
    </header>

    <main class="container mx-auto py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white mt-8">
         @include('layouts.partials.footer')
    </footer>

    <!-- Thêm script ở cuối body -->
    <script>
        // Thêm code xử lý click thay vì chỉ dựa vào hover
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            
            dropdownToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const parent = this.closest('.dropdown');
                    const menu = parent.querySelector('.dropdown-menu');
                    menu.classList.toggle('show');
                    
                    // Đóng các dropdown khác
                    document.querySelectorAll('.dropdown-menu.show').forEach(openMenu => {
                        if (openMenu !== menu) {
                            openMenu.classList.remove('show');
                        }
                    });
                });
            });
            
            // Đóng dropdown khi click ra ngoài
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown')) {
                    document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                        menu.classList.remove('show');
                    });
                }
            });
        });
    </script>
</body>
</html>