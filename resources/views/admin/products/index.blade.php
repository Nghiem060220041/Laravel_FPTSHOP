@extends('layouts.admin')

@section('title', 'Quản lý Sản phẩm')
@section('header_title', 'Danh Sách Sản Phẩm')

@section('content')
    <a href="{{ route('products.create') }}" style="display: inline-block; padding: 10px 15px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">Thêm Sản Phẩm Mới</a>
    
    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Hình Ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá Biến Thể (VNĐ)</th>
                <th>Tổng Tồn Kho</th>
                <th>Danh Mục</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                        @else
                            <span>Không có ảnh</span>
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>
                        {{-- Hiển thị khoảng giá nếu có biến thể --}}
                        @if($product->variants->isNotEmpty())
                            {{ number_format($product->variants->min('price')) }}
                            -
                            {{ number_format($product->variants->max('price')) }}
                        @else
                            <span style="color: #888;">Chưa có biến thể</span>
                        @endif
                    </td>
                    <td>
                        {{-- Hiển thị tổng số lượng tồn kho --}}
                        @if($product->variants->isNotEmpty())
                            {{ $product->variants->sum('quantity') }}
                        @else
                            0
                        @endif
                    </td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td style="display: flex; align-items: center; gap: 10px;">
                        <a href="{{ route('products.edit', $product->id) }}">Sửa</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0;">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align: center;">Chưa có sản phẩm nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 20px;">{{ $products->links() }}</div>
@endsection