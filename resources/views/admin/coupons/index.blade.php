@extends('layouts.admin')
@section('title', 'Mã Giảm Giá')
@section('header_title', 'Quản lý Mã Giảm Giá')

@section('content')
    <a href="{{ route('coupons.create') }}" style="display: inline-block; padding: 10px 15px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">Thêm Mã Giảm Giá</a>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Mã (Code)</th>
                <th>Loại</th>
                <th>Giá trị</th>
                <th>Ngày hết hạn</th>
                <th>Đã dùng / Giới hạn</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($coupons as $coupon)
                <tr>
                    <td style="font-weight: bold; color: #0d6efd;">{{ $coupon->code }}</td>
                    <td>{{ $coupon->type == 'fixed' ? 'Số tiền' : 'Phần trăm (%)' }}</td>
                    <td>{{ $coupon->type == 'fixed' ? number_format($coupon->value) . ' VNĐ' : $coupon->value . ' %' }}</td>
                    <td>{{ $coupon->expires_at ? $coupon->expires_at->format('d/m/Y') : 'Không hết hạn' }}</td>
                    <td>{{ $coupon->times_used }} / {{ $coupon->usage_limit ?? '∞' }}</td>
                    <td style="display: flex; gap: 10px;">
                        <a href="{{ route('coupons.edit', $coupon->id) }}">Sửa</a>
                        <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0;">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" style="text-align: center;">Chưa có mã giảm giá nào.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 20px;">{{ $coupons->links() }}</div>
@endsection