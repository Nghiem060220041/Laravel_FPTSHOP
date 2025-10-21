@extends('layouts.admin')

@section('title', 'Quản lý Đơn hàng')
@section('header_title', 'Danh Sách Đơn Hàng')

@section('content')
    <x-admin.table :headers="['Mã Đơn', 'Tên Khách Hàng', 'Tổng Tiền', 'Trạng Thái', 'Ngày Đặt', 'Hành Động']">
        @forelse ($orders as $order)
            <tr>
                <td class="px-6 py-4">#{{ $order->id }}</td>
                <td class="px-6 py-4">{{ $order->user->name ?? 'Khách vãng lai' }}</td>
                <td class="px-6 py-4">{{ number_format($order->total_amount) }} VNĐ</td>
                <td class="px-6 py-4">
                    <x-admin.badge color="{{ $order->status === 'completed' ? 'green' : ($order->status === 'cancelled' ? 'red' : 'blue') }}">
                        {{ $order->status }}
                    </x-admin.badge>
                </td>
                <td class="px-6 py-4">{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td class="px-6 py-4">
                    <x-admin.button href="{{ route('admin.orders.show', $order->id) }}" color="info" size="sm">
                        Xem Chi Tiết
                    </x-admin.button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center">Chưa có đơn hàng nào.</td>
            </tr>
        @endforelse
    </x-admin.table>
    
    <div class="mt-5">
        {{ $orders->links() }}
    </div>
@endsection