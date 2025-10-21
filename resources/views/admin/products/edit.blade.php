@extends('layouts.admin')

@section('title', 'Sửa Sản Phẩm')
@section('header_title', 'Sửa Thông Tin Sản Phẩm')

@section('content')
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">
            <strong>Có lỗi xảy ra! Vui lòng kiểm tra lại.</strong>
             <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" x-data="{ variants: {{ json_encode(old('variants', $product->variants->map->only(['name', 'price', 'quantity']))) }} }">
        @csrf
        @method('PUT')
        {{-- THÔNG TIN SẢN PHẨM CHÍNH --}}
        <h4>Thông Tin Cơ Bản</h4>
        <div style="margin-bottom: 15px;">
            <label for="name" style="font-weight: bold;">Tên Sản Phẩm</label>
            <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" required style="width: 100%; padding: 8px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="category_id" style="font-weight: bold;">Danh Mục</label>
            <select name="category_id" id="category_id" required style="width: 100%; padding: 8px;">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="description" style="font-weight: bold;">Mô Tả</label>
            <textarea id="description" name="description" rows="5" style="width: 100%; padding: 8px;">{{ old('description', $product->description) }}</textarea>
        </div>
        <div style="margin-bottom: 20px;">
            <label for="image" style="font-weight: bold;">Thay Đổi Hình Ảnh</label>
            <input type="file" id="image" name="image" style="width: 100%; padding: 8px;">
            @if($product->image)
                <div style="margin-top: 10px;"><label>Ảnh hiện tại:</label><br><img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="150"></div>
            @endif
        </div>
        <hr style="margin: 30px 0;">

        {{-- KHU VỰC QUẢN LÝ BIẾN THỂ --}}
        <h4>Các Biến Thể Sản Phẩm</h4>
        <div id="variant-list">
            <template x-for="(variant, index) in variants" :key="index">
                <div class="variant-row" style="display: flex; gap: 10px; align-items: center; margin-bottom: 10px; padding: 10px; border: 1px solid #eee; border-radius: 4px;">
                    <input type="text" :name="`variants[${index}][name]`" x-model="variant.name" placeholder="Tên biến thể (VD: Đỏ, 256GB)" style="flex: 3; padding: 8px;" required>
                    <input type="number" :name="`variants[${index}][price]`" x-model="variant.price" placeholder="Giá" style="flex: 2; padding: 8px;" required>
                    <input type="number" :name="`variants[${index}][quantity]`" x-model="variant.quantity" placeholder="Số lượng" style="flex: 1; padding: 8px;" required>
                    <button type="button" @click="variants.splice(index, 1)" style="color: red; background: none; border: none; cursor: pointer; font-weight: bold;">Xóa</button>
                </div>
            </template>
        </div>
        <button type="button" @click="variants.push({ name: '', price: '', quantity: '' })" style="margin-top: 10px; padding: 8px 12px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">+ Thêm Biến Thể</button>
        <hr style="margin: 30px 0;">

        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Cập Nhật Sản Phẩm</button>
    </form>
@endsection