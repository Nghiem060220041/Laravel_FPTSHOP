@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header_title', 'Trang Tổng Quan')

@section('content')
    {{-- PHẦN THỐNG KÊ --}}
    <div class="flex flex-wrap gap-5 mb-8">
        
        {{-- Thẻ Tổng Sản Phẩm --}}
        <x-admin.card class="flex-1 min-w-[200px] text-center">
            <h3 class="mt-0 text-xl text-gray-700">Tổng Sản Phẩm</h3>
            <p class="text-4xl font-bold text-blue-600 mb-0">{{ $totalProducts }}</p>
        </x-admin.card>

        {{-- Thẻ Tổng Danh Mục --}}
        <x-admin.card class="flex-1 min-w-[200px] text-center">
            <h3 class="mt-0 text-xl text-gray-700">Tổng Danh Mục</h3>
            <p class="text-4xl font-bold text-green-600 mb-0">{{ $totalCategories }}</p>
        </x-admin.card>

        {{-- Thẻ Khách Hàng --}}
        <x-admin.card class="flex-1 min-w-[200px] text-center">
            <h3 class="mt-0 text-xl text-gray-700">Khách Hàng</h3>
            <p class="text-4xl font-bold text-yellow-500 mb-0">{{ $totalUsers }}</p>
        </x-admin.card>

        {{-- Thẻ Tổng Doanh Thu --}}
        <x-admin.card class="flex-1 min-w-[200px] text-center">
            <h3 class="mt-0 text-xl text-gray-700">Tổng Doanh Thu</h3>
            <p class="text-4xl font-bold text-red-600 mb-0">{{ number_format($totalRevenue) }} VNĐ</p>
        </x-admin.card>
        
    </div>

    {{-- BIỂU ĐỒ --}}
    <x-admin.card class="mt-10">
        <h3 class="mt-0 text-xl font-semibold mb-4">Doanh thu 7 ngày qua</h3>
        <div class="max-h-[400px]">
            <canvas id="revenueChart"></canvas>
        </div>
    </x-admin.card>

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