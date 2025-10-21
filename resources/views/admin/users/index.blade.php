@extends('layouts.admin')

@section('title', 'Quản lý Khách hàng')
@section('header_title', 'Danh Sách Khách Hàng')

@section('content')
    @if (session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div style="background-color: #f8d7da; color: #721c24; padding: 1rem; border-radius: 5px; margin-bottom: 20px;">{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Khách Hàng</th>
                <th>Email</th>
                <th>Ngày Đăng Ký</th>
                <th>Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                    <td>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0;">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" style="text-align: center;">Chưa có khách hàng nào đăng ký.</td></tr>
            @endforelse
        </tbody>
    </table>
    <div style="margin-top: 20px;">{{ $users->links() }}</div>
@endsection