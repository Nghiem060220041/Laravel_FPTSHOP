@extends('layouts.admin')

@section('title', 'Quản lý Khách hàng')
@section('header_title', 'Danh Sách Khách Hàng')

@section('content')
    @if (session('success'))
        <x-admin.alert type="success" class="mb-5">
            {{ session('success') }}
        </x-admin.alert>
    @endif
    
    @if (session('error'))
        <x-admin.alert type="error" class="mb-5">
            {{ session('error') }}
        </x-admin.alert>
    @endif

    <x-admin.table :headers="['ID', 'Tên Khách Hàng', 'Email', 'Ngày Đăng Ký', 'Hành Động']">
        @forelse ($users as $user)
            <tr>
                <td class="px-6 py-4">{{ $user->id }}</td>
                <td class="px-6 py-4">{{ $user->name }}</td>
                <td class="px-6 py-4">{{ $user->email }}</td>
                <td class="px-6 py-4">{{ $user->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4">
                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?');">
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
                <td colspan="5" class="px-6 py-4 text-center">Chưa có khách hàng nào đăng ký.</td>
            </tr>
        @endforelse
    </x-admin.table>
    
    <div class="mt-5">
        {{ $users->links() }}
    </div>
@endsection