@extends('layouts.admin')

@section('title', 'Quản lý Đơn hàng')
@section('header_title', 'Danh Sách Đơn Hàng')

@section('content')
    <table>
        <thead>
            <tr>
                <th>Mã Đơn</th>
                <th>Tên Khách Hàng</th>
                <th>Tổng Tiền</th>
                <th>Trạng Thái</th>
                <th>Ngày Đặt</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($orders as $order)
                <tr>
                    <td>#{{ $order->id }}</td>
                    <td>{{ $order->user->name ?? 'Khách vãng lai' }}</td>
                    <td>{{ number_format($order->total_amount) }} VNĐ</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                    <td><a href="{{ route('admin.orders.show', $order->id) }}">Xem Chi Tiết</a></td>
                </tr>
            @empty
                <tr><td colspan="6" style="text-align: center;">Chưa có đơn hàng nào.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 20px;">{{ $orders->links() }}</div>
@endsection