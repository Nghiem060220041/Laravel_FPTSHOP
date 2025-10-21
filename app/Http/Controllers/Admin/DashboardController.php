<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Đếm tổng số lượng bản ghi từ các bảng
        $totalProducts = Product::count();
        $totalCategories = Category::count();
        $totalUsers = User::where('role', User::ROLE_USER)->count();

        // Đếm số người dùng không phải admin (role = 0)
        $totalUsers = User::where('role', User::ROLE_USER)->count();
        $totalRevenue = Order::where('status', 'completed')->sum('total_amount');
        // Gửi các số liệu này tới view
        return view('admin.dashboard', compact(
            'totalProducts', 
            'totalCategories', 
            'totalUsers',
            'totalRevenue'
        ));
    }

    // cung cấp dữ liệu doanh thu 7 ngày qua biểu đồ
    public function revenueStats()
    {
        // lấy dữ liệu 7 ngày qua, nhóm theo ngày và tính tổng
        $stats = Order::where('status', 'completed')
            ->whereBetween('created_at', [Carbon::now()->subDays(6)->startOfDay(), Carbon::now()->endOfDay()])
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('SUM(total_amount) as total')
            )
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        // chuẩn bị mảng dữ liệu 7 ngày (0 cho ngày 0 có doanh thu)
        $labels = [];
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('d/m');

            // tìm doanh thu cho ngày này, nếu không có thì trả về 0
            $stat = $stats->firstWhere('date', $date->format('Y-m-d'));
            $data[] = $stat ? $stat->total : 0;
        }

        return response()->json(['labels' => $labels, 'data' => $data]);
    }
}