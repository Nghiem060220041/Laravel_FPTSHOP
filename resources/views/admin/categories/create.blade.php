@extends('layouts.admin')

@section('title', 'Thêm Danh Mục')
@section('header_title', 'Thêm Danh Mục Mới')

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

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Tên Danh Mục</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
            @error('name')
                <p style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>

        {{-- THÊM MỚI: Ô CHỌN DANH MỤC CHA --}}
        <div style="margin-bottom: 15px;">
            <label for="parent_id" style="display: block; margin-bottom: 5px; font-weight: bold;">Danh Mục Cha (Tùy chọn)</label>
            <select name="parent_id" id="parent_id" style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
                <option value="">-- Là danh mục gốc --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('parent_id') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('parent_id')
                <p style="color: red; font-size: 0.9em; margin-top: 5px;">{{ $message }}</p>
            @enderror
        </div>
        {{-- KẾT THÚC THÊM MỚI --}}

        <button type="submit" style="padding: 10px 20px; background-color: #0d6efd; color: white; border: none; border-radius: 5px; cursor: pointer;">Lưu Danh Mục</button>
    </form>
@endsection