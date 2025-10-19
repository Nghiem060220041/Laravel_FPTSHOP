{{-- resources/views/admin/products/create.blade.php --}}

{{-- Giả sử bạn có một layout chung cho admin --}}
{{-- @extends('layouts.admin') --}}
{{-- @section('content') --}}

<div class="container" style="padding: 2rem; max-width: 800px; margin: auto;">
    <h1>Thêm Sản Phẩm Mới</h1>

    {{-- Hiển thị lỗi validation nếu có --}}
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

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- Bắt buộc phải có để bảo mật --}}
        
        <div style="margin-bottom: 15px;">
            <label for="category_id" style="display: block; margin-bottom: 5px; font-weight: bold;">Danh Mục</label>
            <select name="category_id" id="category_id" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="">-- Chọn Danh Mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Tên Sản Phẩm</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>


        <div style="margin-bottom: 15px;">
            <label for="price" style="display: block; margin-bottom: 5px; font-weight: bold;">Giá (VNĐ)</label>
            <input type="number" id="price" name="price" value="{{ old('price') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; margin-bottom: 5px; font-weight: bold;">Mô Tả</label>
            <textarea id="description" name="description" rows="5" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ old('description') }}</textarea>
        </div>

        <div style="margin-bottom: 20px;">
            <label for="image" style="display: block; margin-bottom: 5px; font-weight: bold;">Hình Ảnh</label>
            <input type="file" id="image" name="image" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>

        <button type="submit" style="padding: 10px 20px; background-color: #0d6efd; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Lưu Sản Phẩm</button>
    </form>
</div>

{{-- @endsection --}}