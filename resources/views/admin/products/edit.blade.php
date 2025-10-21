@extends('layouts.admin')

@section('title', 'Sửa Sản Phẩm')
@section('header_title', 'Sửa Thông Tin Sản Phẩm')

@section('content')
    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">
            <strong>Có lỗi xảy ra! Vui lòng kiểm tra lại.</strong>
             <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
        </div>
    @endif

    {{-- Khởi tạo Alpine.js với dữ liệu biến thể cũ --}}
    {{-- json_encode($product->variants->map(function ($variant) { ... })) đảm bảo $variant->attributes là mảng --}}
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
          x-data="{ 
              variants: {{ json_encode(old('variants', $product->variants->map(function ($variant) { return ['name' => $variant->name, 'attributes' => $variant->attributes ?? [['key' => '', 'value' => '']], 'price' => $variant->price, 'quantity' => $variant->quantity]; }) )) }},
              addVariant() { this.variants.push({ name: '', attributes: [{key: '', value: ''}], price: '', quantity: '' }); },
              removeVariant(index) { this.variants.splice(index, 1); },
              addAttribute(variantIndex) { this.variants[variantIndex].attributes.push({key: '', value: ''}); },
              removeAttribute(variantIndex, attrIndex) { this.variants[variantIndex].attributes.splice(attrIndex, 1); }
          }">
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
                <div class="variant-row" style="margin-bottom: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 5px; background-color: #f9f9f9;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
                        <h5 style="margin: 0;" x-text="`Biến thể #${index + 1}`"></h5>
                        <button type="button" @click="removeVariant(index)" style="color: red; background: none; border: none; cursor: pointer; font-weight: bold;">Xóa Biến Thể Này</button>
                    </div>
                     {{-- Tên gợi nhớ --}}
                    <div style="margin-bottom: 10px;">
                        <label :for="`variant_name_${index}`">Tên Gợi Nhớ</label>
                        <input type="text" :id="`variant_name_${index}`" :name="`variants[${index}][name]`" x-model="variant.name" style="width: 100%; padding: 8px;">
                    </div>
                    {{-- Quản lý Thuộc tính --}}
                    <div style="margin-bottom: 10px; padding-left: 15px; border-left: 3px solid #eee;">
                        <label style="font-weight: bold; display: block; margin-bottom: 5px;">Thuộc Tính:</label>
                        <template x-for="(attribute, attrIndex) in variant.attributes" :key="attrIndex">
                           <div style="display: flex; gap: 10px; margin-bottom: 5px;">
                               <input type="text"      :name="`variants[${index}][attributes][${attrIndex}][key]`"   x-model="attribute.key"   placeholder="Tên thuộc tính (VD: Màu)" style="flex: 1; padding: 6px;">
                               <input type="text"      :name="`variants[${index}][attributes][${attrIndex}][value]`" x-model="attribute.value" placeholder="Giá trị (VD: Xanh)" style="flex: 2; padding: 6px;">
                               <button type="button" @click="removeAttribute(index, attrIndex)" style="color: #aaa;">x</button>
                           </div>
                        </template>
                        <button type="button" @click="addAttribute(index)" style="font-size: 0.9em; padding: 3px 6px;">+ Thêm thuộc tính</button>
                    </div>
                    {{-- Giá và Số lượng --}}
                    <div style="display: flex; gap: 15px; margin-top: 10px;">
                        <div style="flex: 1;">
                            <label :for="`variant_price_${index}`" style="font-weight: bold;">Giá (VNĐ)</label>
                            <input type="number" :id="`variant_price_${index}`" :name="`variants[${index}][price]`" x-model="variant.price" required style="width: 100%; padding: 8px;">
                        </div>
                        <div style="flex: 1;">
                            <label :for="`variant_quantity_${index}`" style="font-weight: bold;">Số Lượng Tồn Kho</label>
                            <input type="number" :id="`variant_quantity_${index}`" :name="`variants[${index}][quantity]`" x-model="variant.quantity" required style="width: 100%; padding: 8px;">
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <button type="button" @click="addVariant()" style="margin-top: 10px; padding: 8px 12px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer;">+ Thêm Biến Thể Mới</button>
        <hr style="margin: 30px 0;">

        <button type="submit" style="padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Cập Nhật Sản Phẩm</button>
    </form>
@endsection