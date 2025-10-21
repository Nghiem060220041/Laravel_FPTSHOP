@extends('layouts.admin')
@section('title', 'Mã Giảm Giá')
@section('header_title', 'Quản lý Mã Giảm Giá')

@section('content')
    <x-admin.button href="{{ route('coupons.create') }}" color="primary" class="mb-5">
        Thêm Mã Giảm Giá
    </x-admin.button>

    @if (session('success'))
        <x-admin.alert type="success" class="mb-5">
            {{ session('success') }}
        </x-admin.alert>
    @endif

    <x-admin.table :headers="['Mã (Code)', 'Loại', 'Giá trị', 'Ngày hết hạn', 'Đã dùng / Giới hạn', 'Hành Động']">
        @forelse ($coupons as $coupon)
            <tr>
                <td class="px-6 py-4 font-bold text-blue-600">{{ $coupon->code }}</td>
                <td class="px-6 py-4">{{ $coupon->type == 'fixed' ? 'Số tiền' : 'Phần trăm (%)' }}</td>
                <td class="px-6 py-4">{{ $coupon->type == 'fixed' ? number_format($coupon->value) . ' VNĐ' : $coupon->value . ' %' }}</td>
                <td class="px-6 py-4">{{ $coupon->expires_at ? $coupon->expires_at->format('d/m/Y') : 'Không hết hạn' }}</td>
                <td class="px-6 py-4">{{ $coupon->times_used }} / {{ $coupon->usage_limit ?? '∞' }}</td>
                <td class="px-6 py-4 flex items-center gap-2">
                    <x-admin.button href="{{ route('coupons.edit', $coupon->id) }}" color="info" size="sm">
                        Sửa
                    </x-admin.button>
                    <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                        @csrf
                        @method('DELETE')
                        <x-admin.button type="submit" color="danger" size="sm">
                            Xóa
                        </x-admin.button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center">Chưa có mã giảm giá nào.</td>
            </tr>
        @endforelse
    </x-admin.table>
    
    <div class="mt-5">
        {{ $coupons->links() }}
    </div>
@endsection