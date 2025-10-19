<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Đếm tổng số lượng bản ghi từ các bảng
        $totalProducts = Product::count();
        $totalCategories = Category::count();

        // Đếm số người dùng không phải admin (role = 0)
        $totalUsers = User::where('role', User::ROLE_USER)->count();

        // Gửi các số liệu này tới view
        return view('admin.dashboard', compact(
            'totalProducts', 
            'totalCategories', 
            'totalUsers'
        ));
    }
}