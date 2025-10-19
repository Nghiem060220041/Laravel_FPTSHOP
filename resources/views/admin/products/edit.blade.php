{{-- resources/views/admin/products/edit.blade.php --}}

{{-- Giả sử bạn có một layout chung cho admin --}}
{{-- @extends('layouts.admin') --}}
{{-- @section('content') --}}

<div class="container" style="padding: 2rem; max-width: 800px; margin: auto;">
    <h1>Sửa Thông Tin Sản Phẩm</h1>

    {{-- Thêm khối hiển thị lỗi validation --}}
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; border: 1px solid #f5c6cb; border-radius: 5px; margin-bottom: 20px;">
            <strong>Có lỗi xảy ra! Vui lòng kiểm tra lại.</strong>
            <ul style="margin-top: 10px; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Báo cho Laravel đây là request UPDATE --}}

        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Tên Sản Phẩm</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="category_id" style="display: block; margin-bottom: 5px; font-weight: bold;">Danh Mục</label>
            <select name="category_id" id="category_id" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="">-- Chọn Danh Mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="price" style="display: block; margin-bottom: 5px; font-weight: bold;">Giá (VNĐ)</label>
            <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px; font-weight: bold;">Mô Tả</label>
            <textarea id="description" name="description" rows="5" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ old('description', $product->description) }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; margin-bottom: 5px; font-weight: bold;">Thay Đổi Hình Ảnh</label>
            <input type="file" id="image" name="image" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            
            {{-- Hiển thị ảnh hiện tại --}}
            @if($product->image)
                <div style="margin-top: 10px;">
                    <label style="display: block; margin-bottom: 5px;">Ảnh hiện tại:</label>
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150" style="border: 1px solid #ddd; padding: 5px; border-radius: 4px;">
                </div>
            @endif
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Cập Nhật Sản Phẩm</button>
    </form>
</div>

{{-- @endsection --}}