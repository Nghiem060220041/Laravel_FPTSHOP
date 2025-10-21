@extends('layouts.admin')

@section('title', 'Chi tiết Đơn hàng')
@section('header_title', 'Chi Tiết Đơn Hàng #' . $order->id)

@section('content')
    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
        @csrf
        @method('PATCH')
        <label for="status" style="font-weight: bold;">Cập nhật trạng thái:</label>
        <select name="status" id="status" style="padding: 5px;">
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Đang chờ xử lý</option>
            <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Đang xử lý</option>
            <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Đã giao hàng</option>
            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Hoàn thành</option>
            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Đã hủy</option>
        </select>
        <button type="submit" style="padding: 5px 10px; background-color: #007bff; color: white; border: none; border-radius: 4px;">Cập nhật</button>
    </form>

    <div style="display: flex; gap: 30px; border-top: 1px solid #eee; padding-top: 20px;">
        <div style="flex: 1;">
            <h4>Thông Tin Khách Hàng</h4>
            <p><strong>Tên:</strong> {{ $order->user->name }}</p>
            <p><strong>Email:</strong> {{ $order->user->email }}</p>
            <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
        </div>
        <div style="flex: 1;">
            <h4>Thông Tin Đơn Hàng</h4>
            <p><strong>Mã đơn:</strong> #{{ $order->id }}</p>
            <p><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Trạng thái:</strong> <span style="font-weight: bold;">{{ ucfirst($order->status) }}</span></p>
            <p><strong>Tổng tiền:</strong> <span style="color: red; font-weight: bold;">{{ number_format($order->total_amount) }} VNĐ</span></p>
        </div>
    </div>

    <h4 style="margin-top: 30px; border-top: 1px solid #eee; padding-top: 20px;">Các Sản Phẩm Đã Đặt</h4>
    <table>
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Đơn giá</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->pivot->quantity }}</td>
                    <td>{{ number_format($product->pivot->price) }} VNĐ</td>
                    <td>{{ number_format($product->pivot->quantity * $product->pivot->price) }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection