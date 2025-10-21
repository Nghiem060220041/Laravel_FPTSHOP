<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - FPTShop</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background-color: #f4f7fa; color: #333; }
        .admin-container { display: flex; min-height: 100vh; }
        .sidebar { width: 250px; background-color: #2c3e50; color: white; padding-top: 20px; }
        .sidebar h2 { text-align: center; color: #ecf0f1; margin-bottom: 30px; }
        .sidebar ul { list-style-type: none; padding: 0; }
        .sidebar ul li a { display: block; color: #ecf0f1; padding: 15px 20px; text-decoration: none; transition: background-color 0.3s; }
        .sidebar ul li a:hover, .sidebar ul li a.active { background-color: #34495e; }
        .main-content { flex-grow: 1; display: flex; flex-direction: column; }
        .header { background-color: #ffffff; padding: 15px 30px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center; }
        .header .user-info form { margin: 0; }
        .header .user-info button { background: none; border: none; color: #e74c3c; cursor: pointer; font-size: 16px; }
        .content-area { padding: 30px; }
        .content-card { background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 2rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f2f2f2; }
        a { color: #3498db; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="admin-container">
    <aside class="sidebar">
        <h2>FPTShop Admin</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a></li>
            
            {{-- THÊM LẠI CÁC LINK QUẢN LÝ TẠI ĐÂY --}}
            @can('manage products')
                <li><a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">Quản lý Sản phẩm</a></li>
            @endcan
            
            @can('manage categories')
                <li><a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">Quản lý Danh mục</a></li>
            @endcan

            @can('manage users')
                <li><a href="{{ route('admin.users.index') }}" class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">Quản lý Khách hàng</a></li>
            @endcan

            @can('manage orders')
                <li><a href="{{ route('admin.orders.index') }}" class="{{ request()->routeIs('admin.orders.*') ? 'active' : '' }}">Quản lý Đơn hàng</a></li>
            @endcan

        </ul>
    </aside>

    <div class="main-content">
        <header class="header">
            <div>
                <h3>@yield('header_title', 'Tổng Quan')</h3>
            </div>
            <div class="user-info">
                <span>Xin chào, <strong>{{ Auth::user()->name }}</strong></span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline; margin-left: 15px;">
                    @csrf
                    <button type="submit">Đăng xuất</button>
                </form>
            </div>
        </header>

        <main class="content-area">
            <div class="content-card">
                @yield('content')
            </div>
        </main>
    </div>
</div>

</body>
</html>