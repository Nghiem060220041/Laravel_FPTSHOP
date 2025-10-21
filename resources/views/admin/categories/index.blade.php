@extends('layouts.admin')

@section('title', 'Quản lý Danh mục')
@section('header_title', 'Danh Sách Danh Mục')

@section('content')
    <a href="{{ route('categories.create') }}" style="display: inline-block; padding: 10px 15px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 20px;">Thêm Danh Mục Mới</a>

    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Danh Mục</th>
                <th>Slug</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td style="display: flex; align-items: center; gap: 10px;">
                        <a href="{{ route('categories.edit', $category->id) }}">Sửa</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0;">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" style="text-align: center;">Chưa có danh mục nào.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 20px;">{{ $categories->links() }}</div>
@endsection