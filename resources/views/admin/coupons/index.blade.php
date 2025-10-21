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
                <th>Ngày bắt đầu</th> {{-- <-- ĐÃ SỬA --}}
                <th>Hết hạn vào</th>
                <th>Đã dùng / Giới hạn</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($coupons as $coupon)
                {{-- Kiểm tra xem mã còn hoạt động không --}}
                @php
                    $isExpired = $coupon->expires_at && $coupon->expires_at->isPast();
                    $isUsageLimitReached = $coupon->usage_limit !== null && $coupon->times_used >= $coupon->usage_limit;
                    // Thêm kiểm tra ngày bắt đầu
                    $isNotYetActive = $coupon->starts_at && $coupon->starts_at->isFuture(); 
                    $isInactive = $isExpired || $isUsageLimitReached || $isNotYetActive; // Mã không hoạt động nếu chưa đến ngày hoặc đã hết hạn/lượt
                @endphp

                {{-- Áp dụng style nếu mã không hoạt động --}}
                <tr style="{{ $isInactive ? 'text-decoration: line-through; color: #aaa;' : '' }}">
                    <td style="font-weight: bold; color: {{ $isInactive ? '#aaa' : '#0d6efd' }};">
                        {{ $coupon->code }}
                        {{-- Hiển thị lý do không hoạt động --}}
                        @if ($isNotYetActive)
                            <small style="display: block; color: #17a2b8;">(Chưa có hiệu lực)</small>
                        @elseif ($isExpired)
                            <small style="display: block; color: #dc3545;">(Hết hạn)</small>
                        @elseif ($isUsageLimitReached)
                            <small style="display: block; color: #ffc107;">(Hết lượt dùng)</small>
                        @endif
                    </td>
                    <td>{{ $coupon->type == 'fixed' ? 'Số tiền' : 'Phần trăm (%)' }}</td>
                    <td>{{ $coupon->type == 'fixed' ? number_format($coupon->value) . ' VNĐ' : $coupon->value . ' %' }}</td>
                    <td>{{ $coupon->starts_at ? $coupon->starts_at->format('d/m/Y') : 'Luôn có hiệu lực' }}</td>
                    <td>{{ $coupon->expires_at ? $coupon->expires_at->format('d/m/Y') : 'Không hết hạn' }}</td>
                    <td>{{ $coupon->times_used }} / {{ $coupon->usage_limit ?? '∞' }}</td>
                    <td style="display: flex; gap: 10px;">
                        {{-- Chỉ cho phép sửa nếu mã chưa hết hạn --}}
                        @if (!$isExpired)
                            <a href="{{ route('coupons.edit', $coupon->id) }}">Sửa</a>
                        @endif
                        <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa mã giảm giá này không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0;">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7" style="text-align: center;">Chưa có mã giảm giá nào.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 20px;">{{ $coupons->links() }}</div>
@endsection