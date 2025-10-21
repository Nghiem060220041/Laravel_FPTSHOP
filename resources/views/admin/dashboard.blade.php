@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header_title', 'Trang Tổng Quan')

@section('content')
    {{-- PHẦN THỐNG KÊ --}}
    <div class="stats-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
        
        {{-- Thẻ Tổng Sản Phẩm --}}
        <div class="stat-card" style="flex: 1; min-width: 200px; text-align: center; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h3 style="margin-top: 0; font-size: 1.2rem; color: #495057;">Tổng Sản Phẩm</h3>
            <p style="font-size: 2.5rem; font-weight: bold; color: #007bff; margin-bottom: 0;">{{ $totalProducts }}</p>
        </div>

        {{-- Thẻ Tổng Danh Mục --}}
        <div class="stat-card" style="flex: 1; min-width: 200px; text-align: center; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h3 style="margin-top: 0; font-size: 1.2rem; color: #495057;">Tổng Danh Mục</h3>
            <p style="font-size: 2.5rem; font-weight: bold; color: #28a745; margin-bottom: 0;">{{ $totalCategories }}</p>
        </div>

        {{-- Thẻ Khách Hàng --}}
        <div class="stat-card" style="flex: 1; min-width: 200px; text-align: center; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h3 style="margin-top: 0; font-size: 1.2rem; color: #495057;">Khách Hàng</h3>
            <p style="font-size: 2.5rem; font-weight: bold; color: #ffc107; margin-bottom: 0;">{{ $totalUsers }}</p>
        </div>

        {{-- Thẻ Tổng Doanh Thu --}}
        <div class="stat-card" style="flex: 1; min-width: 200px; text-align: center; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h3 style="margin-top: 0; font-size: 1.2rem; color: #495057;">Tổng Doanh Thu</h3>
            <p style="font-size: 2.5rem; font-weight: bold; color: #e74c3c; margin-bottom: 0;">{{ number_format($totalRevenue) }} VNĐ</p>
        </div>
        
    </div>

    {{-- BIỂU ĐỒ --}}
    <div class="chart-container" style="margin-top: 40px; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
        <h3 style="margin-top: 0;">Doanh thu 7 ngày qua</h3>
        <canvas id="revenueChart" style="max-height: 400px;"></canvas>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        
        fetch('{{ route("admin.stats.revenue") }}')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
             })
            .then(apiData => {
                
                const ctx = document.getElementById('revenueChart').getContext('2d');
                
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: apiData.labels,
                        datasets: [{
                            label: 'Doanh thu (VNĐ)',
                            data: apiData.data,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            fill: true,
                            tension: 0.1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true,
                                max: 100000000,
                                ticks: {
                                    callback: function(value) {
                                        return new Intl.NumberFormat('vi-VN').format(value) + ' VNĐ';
                                    }
                                }
                            }
                        }
                    }
                });
            })
            .catch(error => console.error('Lỗi khi tải dữ liệu biểu đồ:', error));
    });
    </script>
@endsection