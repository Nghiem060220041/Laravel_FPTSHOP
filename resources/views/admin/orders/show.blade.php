@extends('layouts.admin')

@section('title', 'Chi tiết Đơn hàng')
@section('header_title', 'Chi Tiết Đơn Hàng #' . $order->id)

@section('content')
    @if (session('success'))
        <x-admin.alert type="success" class="mb-5">
            {{ session('success') }}
        </x-admin.alert>
    @endif

    <x-admin.card class="mb-6">
        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="flex items-center gap-4">
            @csrf
            @method('PATCH')
            <label for="status" class="font-bold">Cập nhật trạng thái:</label>
            <x-admin.select
                name="status"
                id="status"
                :options="[
                    'pending' => 'Đang chờ xử lý',
                    'processing' => 'Đang xử lý',
                    'shipped' => 'Đã giao hàng',
                    'completed' => 'Hoàn thành',
                    'cancelled' => 'Đã hủy'
                ]"
                :selected="$order->status"
                class="w-auto"
            />
            <x-admin.button type="submit" color="primary" size="sm">
                Cập nhật
            </x-admin.button>
        </form>
    </x-admin.card>

    <div class="flex flex-col md:flex-row gap-6 border-t border-gray-200 pt-5">
        <x-admin.card title="Thông Tin Khách Hàng" class="flex-1">
            <p class="mb-2"><span class="font-bold">Tên:</span> {{ $order->user->name }}</p>
            <p class="mb-2"><span class="font-bold">Email:</span> {{ $order->user->email }}</p>
            <p class="mb-2"><span class="font-bold">Địa chỉ giao hàng:</span> {{ $order->shipping_address }}</p>
        </x-admin.card>
        
        <x-admin.card title="Thông Tin Đơn Hàng" class="flex-1">
            <p class="mb-2"><span class="font-bold">Mã đơn:</span> #{{ $order->id }}</p>
            <p class="mb-2"><span class="font-bold">Ngày đặt:</span> {{ $order->created_at->format('d/m/Y H:i') }}</p>
            <p class="mb-2">
                <span class="font-bold">Trạng thái:</span> 
                <x-admin.badge color="{{ $order->status === 'completed' ? 'green' : ($order->status === 'cancelled' ? 'red' : 'blue') }}">
                    {{ ucfirst($order->status) }}
                </x-admin.badge>
            </p>
            <p class="mb-2">
                <span class="font-bold">Tổng tiền:</span> 
                <span class="text-red-600 font-bold">{{ number_format($order->total_amount) }} VNĐ</span>
            </p>
        </x-admin.card>
    </div>

    <x-admin.card title="Các Sản Phẩm Đã Đặt" class="mt-6">
        <x-admin.table :headers="['Sản phẩm', 'Số lượng', 'Đơn giá', 'Thành tiền']">
            @foreach ($order->products as $product)
                <tr>
                    <td class="px-6 py-4">{{ $product->name }}</td>
                    <td class="px-6 py-4">{{ $product->pivot->quantity }}</td>
                    <td class="px-6 py-4">{{ number_format($product->pivot->price) }} VNĐ</td>
                    <td class="px-6 py-4">{{ number_format($product->pivot->quantity * $product->pivot->price) }} VNĐ</td>
                </tr>
            @endforeach
        </x-admin.table>
    </x-admin.card>
@endsection