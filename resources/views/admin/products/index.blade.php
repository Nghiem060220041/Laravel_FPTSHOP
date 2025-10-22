@extends('layouts.admin')

@section('title', 'Quản lý Sản phẩm')
@section('header_title', 'Danh Sách Sản Phẩm')

@section('content')
<<<<<<< HEAD
    <x-admin.button href="{{ route('products.create') }}" color="primary" class="mb-5">
        Thêm Sản Phẩm Mới
    </x-admin.button>
    
=======
    <a href="{{ route('products.create') }}" style="display: inline-block; padding: 10px 15px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">Thêm Sản Phẩm Mới</a>

>>>>>>> b0ea778f96b426b5ad8e5267f9447ef91272b0ac
    @if (session('success'))
        <x-admin.alert type="success" class="mb-5">
            {{ session('success') }}
        </x-admin.alert>
    @endif

    <x-admin.table :headers="['ID', 'Hình Ảnh', 'Tên Sản Phẩm', 'Giá Biến Thể (VNĐ)', 'Tổng Tồn Kho', 'Danh Mục', 'Hành Động']">
        @forelse ($products as $product)
            <tr>
<<<<<<< HEAD
                <td class="px-6 py-4">{{ $product->id }}</td>
                <td class="px-6 py-4">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-[100px] h-auto object-contain">
                    @else
                        <span class="text-gray-400">Không có ảnh</span>
                    @endif
                </td>
                <td class="px-6 py-4">{{ $product->name }}</td>
                <td class="px-6 py-4">
                    @if($product->variants->isNotEmpty())
                        {{ number_format($product->variants->min('price')) }}
                        -
                        {{ number_format($product->variants->max('price')) }}
                    @else
                        <span class="text-gray-400">Chưa có biến thể</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    @if($product->variants->isNotEmpty())
                        {{ $product->variants->sum('quantity') }}
                    @else
                        0
                    @endif
                </td>
                <td class="px-6 py-4">{{ $product->category->name ?? 'N/A' }}</td>
                <td class="px-6 py-4 flex items-center gap-2">
                    <x-admin.button href="{{ route('products.edit', $product->id) }}" color="info" size="sm">
                        Sửa
                    </x-admin.button>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
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
                <td colspan="7" class="px-6 py-4 text-center">Chưa có sản phẩm nào.</td>
            </tr>
        @endforelse
    </x-admin.table>
    
    <div class="mt-5">
        {{ $products->links() }}
    </div>

    <!-- Modal thông báo thành công -->
    @if(session('deleted'))
    <div id="successModal" class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50" x-data="{show: true}" x-show="show" x-init="setTimeout(() => show = false, 2000)">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <x-admin.success-icon size="sm">
                <p class="text-lg font-semibold">Xóa sản phẩm thành công!</p>
            </x-admin.success-icon>
        </div>
    </div>
    @endif
=======
                <th>ID</th>
                <th>Hình Ảnh</th>
                <th>Tên Sản Phẩm</th>
                <th>Mô Tả</th> {{-- <- THÊM LẠI TIÊU ĐỀ CỘT --}}
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
                    
                    {{-- THÊM LẠI CỘT DỮ LIỆU MÔ TẢ --}}
                    <td>
                        {{ \Illuminate\Support\Str::limit($product->description, 50, '...') }}
                    </td>
                    
                    <td>
                        @if($product->variants->isNotEmpty())
                            {{ number_format($product->variants->min('price')) }}
                            -
                            {{ number_format($product->variants->max('price')) }}
                        @else
                            <span style="color: #888;">Chưa có biến thể</span>
                        @endif
                    </td>
                    <td>
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
                    <td colspan="8" style="text-align: center;">Chưa có sản phẩm nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 20px;">{{ $products->links() }}</div>
>>>>>>> b0ea778f96b426b5ad8e5267f9447ef91272b0ac
@endsection