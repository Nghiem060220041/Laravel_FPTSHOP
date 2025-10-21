@extends('layouts.admin')

@section('title', 'Quản lý Danh mục')
@section('header_title', 'Danh Sách Danh Mục')

@section('content')
    <x-admin.button href="{{ route('categories.create') }}" color="primary" class="mb-5">
        Thêm Danh Mục Mới
    </x-admin.button>

    @if (session('success'))
        <x-admin.alert type="success" class="mb-5">
            {{ session('success') }}
        </x-admin.alert>
    @endif

    <x-admin.table :headers="['ID', 'Tên Danh Mục', 'Slug', 'Hành Động']">
        @forelse ($categories as $category)
            <tr>
                <td class="px-6 py-4">{{ $category->id }}</td>
                <td class="px-6 py-4">{{ $category->name }}</td>
                <td class="px-6 py-4">{{ $category->slug }}</td>
                <td class="px-6 py-4 flex items-center gap-2">
                    <x-admin.button href="{{ route('categories.edit', $category->id) }}" color="info" size="sm">
                        Sửa
                    </x-admin.button>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
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
                <td colspan="4" class="px-6 py-4 text-center">Chưa có danh mục nào.</td>
            </tr>
        @endforelse
    </x-admin.table>

    <div class="mt-5">
        {{ $categories->links() }}
    </div>
@endsection