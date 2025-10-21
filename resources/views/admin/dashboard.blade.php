@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header_title', 'Trang Tổng Quan')

@section('content')
    <div class="stats-container" style="display: flex; gap: 20px;">
        
        {{-- Thống kê Sản phẩm --}}
        <div class="stat-card" style="flex: 1; text-align: center;">
            <h3 style="margin-top: 0; font-size: 1.2rem; color: #495057;">Tổng Sản Phẩm</h3>
            <p style="font-size: 2.5rem; font-weight: bold; color: #007bff; margin-bottom: 0;">{{ $totalProducts }}</p>
        </div>

        {{-- Thống kê Danh mục --}}
        <div class="stat-card" style="flex: 1; text-align: center;">
            <h3 style="margin-top: 0; font-size: 1.2rem; color: #495057;">Tổng Danh Mục</h3>
            <p style="font-size: 2.5rem; font-weight: bold; color: #28a745; margin-bottom: 0;">{{ $totalCategories }}</p>
        </div>

        {{-- Thống kê Người dùng --}}
        <div class="stat-card" style="flex: 1; text-align: center;">
            <h3 style="margin-top: 0; font-size: 1.2rem; color: #495057;">Khách Hàng</h3>
            <p style="font-size: 2.5rem; font-weight: bold; color: #ffc107; margin-bottom: 0;">{{ $totalUsers }}</p>
        </div>
        
    </div>
@endsection