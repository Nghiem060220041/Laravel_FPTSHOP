@extends('layouts.admin')

@section('title', 'Sửa Danh Mục')
@section('header_title', 'Sửa Tên Danh Mục')

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
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <x-admin.input
                label="Tên Danh Mục"
                name="name"
                id="name"
                value="{{ old('name', $category->name) }}"
                required
                error="{{ $errors->first('name') }}"
            />

            <x-admin.select
                label="Danh Mục Cha (Tùy chọn)"
                name="parent_id"
                id="parent_id"
                :options="$categories->pluck('name', 'id')->toArray()"
                :selected="old('parent_id', $category->parent_id)"
                placeholder="-- Là danh mục gốc --"
                error="{{ $errors->first('parent_id') }}"
            />

            <div class="mt-6">
                <x-admin.button type="submit" color="success">
                    Cập Nhật Danh Mục
                </x-admin.button>
            </div>
        </form>
    </x-admin.card>
@endsection