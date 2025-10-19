{{-- resources/views/admin/products/index.blade.php --}}

<div class="container" style="padding: 2rem;">
    <h1>Danh Sách Sản Phẩm</h1>
    <a href="{{ route('products.create') }}" style="display: inline-block; padding: 10px 15px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">Thêm Sản Phẩm Mới</a>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">ID</th>
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">Hình Ảnh</th>
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">Tên Sản Phẩm</th>
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">Mô Tả</th> {{-- <- THÊM CỘT MỚI --}}
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">Giá</th>
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">Danh Mục</th>
                <th style="padding: 8px; border: 1px solid #ddd; text-align: left;">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $product->id }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">
                        {{-- Đảm bảo code hiển thị ảnh là đúng --}}
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                        @else
                            <span>Không có ảnh</span>
                        @endif
                    </td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $product->name }}</td>
                    
                    {{-- THÊM DỮ LIỆU MÔ TẢ & GIỚI HẠN KÝ TỰ --}}
                    <td style="padding: 8px; border: 1px solid #ddd;">
                        {{ \Illuminate\Support\Str::limit($product->description, 50, '...') }}
                    </td>
                    
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ number_format($product->price) }} VNĐ</td>
                    <td style="padding: 8px; border: 1px solid #ddd;">{{ $product->category->name ?? 'N/A' }}</td>
                    <td style="padding: 8px; border: 1px solid #ddd; display: flex; align-items: center; gap: 10px;">
                        <a href="{{ route('products.edit', $product->id) }}">Sửa</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0;">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="padding: 8px; border: 1px solid #ddd; text-align: center;">Chưa có sản phẩm nào.</td> {{-- <- Sửa colspan="7" --}}
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $products->links() }}
    </div>
</div>