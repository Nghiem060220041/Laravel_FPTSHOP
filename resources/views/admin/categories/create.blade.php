@extends('layouts.admin')

@section('title', 'Thêm Danh Mục')
@section('header_title', 'Thêm Danh Mục Mới')

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
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            
            <x-admin.input
                label="Tên Danh Mục"
                name="name"
                id="name"
                value="{{ old('name') }}"
                required
                error="{{ $errors->first('name') }}"
            />

            <x-admin.select
                label="Danh Mục Cha (Tùy chọn)"
                name="parent_id"
                id="parent_id"
                :options="$categories->pluck('name', 'id')->toArray()"
                :selected="old('parent_id')"
                placeholder="-- Là danh mục gốc --"
                error="{{ $errors->first('parent_id') }}"
            />

            <div class="mt-6">
                <x-admin.button type="submit" color="primary">
                    Lưu Danh Mục
                </x-admin.button>
            </div>
        </form>
    </x-admin.card>
@endsection