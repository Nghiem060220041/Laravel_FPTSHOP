@extends('layouts.admin')

@section('title', 'Thêm Sản Phẩm Mới')
@section('header_title', 'Thêm Sản Phẩm Mới')

@section('content')
    @if ($errors->any())
        <x-admin.alert type="error" class="mb-5">
            <strong>Có lỗi xảy ra! Vui lòng kiểm tra lại.</strong>
            <ul class="mt-2 list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </x-admin.alert>
    @endif

    <x-admin.card>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" x-data="{ variants: [{ name: '', price: '', quantity: '' }] }">
            @csrf
            
            <h4 class="text-lg font-semibold mb-4">Thông Tin Cơ Bản</h4>
            
            <x-admin.input
                label="Tên Sản Phẩm"
                name="name"
                id="name"
                value="{{ old('name') }}"
                required
            />
            
            <x-admin.select
                label="Danh Mục"
                name="category_id"
                id="category_id"
                required
                :options="$categories->pluck('name', 'id')->toArray()"
                :selected="old('category_id')"
                placeholder="-- Chọn Danh Mục --"
            />
            
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Mô Tả</label>
                <textarea 
                    id="description" 
                    name="description" 
                    rows="5" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                >{{ old('description') }}</textarea>
            </div>
            
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Hình Ảnh Đại Diện</label>
                <input 
                    type="file" 
                    id="image" 
                    name="image" 
                    class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-gray-50 focus:outline-none"
                >
            </div>
            
            <hr class="my-8">
            
            <h4 class="text-lg font-semibold mb-4">Các Biến Thể Sản Phẩm</h4>
            
            <div id="variant-list">
                <template x-for="(variant, index) in variants" :key="index">
                    <div class="flex gap-3 items-center mb-3 p-3 border border-gray-200 rounded-md">
                        <input 
                            type="text" 
                            :name="`variants[${index}][name]`" 
                            x-model="variant.name" 
                            placeholder="Tên biến thể (VD: Đỏ, 256GB)" 
                            class="flex-3 p-2 border border-gray-300 rounded-md"
                        >
                        <input 
                            type="number" 
                            :name="`variants[${index}][price]`" 
                            x-model="variant.price" 
                            placeholder="Giá" 
                            class="flex-2 p-2 border border-gray-300 rounded-md"
                            required
                        >
                        <input 
                            type="number" 
                            :name="`variants[${index}][quantity]`" 
                            x-model="variant.quantity" 
                            placeholder="Số lượng" 
                            class="flex-1 p-2 border border-gray-300 rounded-md"
                            required
                        >
                        <button 
                            type="button" 
                            @click="variants.splice(index, 1)" 
                            class="text-red-500 bg-transparent border-none cursor-pointer font-bold"
                        >Xóa</button>
                    </div>
                </template>
            </div>
            
            <x-admin.button 
                type="button" 
                color="success" 
                class="mt-3"
                @click="variants.push({ name: '', price: '', quantity: '' })"
            >
                + Thêm Biến Thể
            </x-admin.button>
            
            <hr class="my-8">
            
            <div class="mt-6">
                <x-admin.button type="submit" color="primary" size="lg">
                    Lưu Sản Phẩm
                </x-admin.button>
            </div>
        </form>
    </x-admin.card>
@endsection