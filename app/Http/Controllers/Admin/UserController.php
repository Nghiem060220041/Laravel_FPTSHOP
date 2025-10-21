<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Lấy tất cả role=0, sắp xếp theo ngày tạo mới nhất
        $users = User::where('role', User::ROLE_USER)->latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        // Kiểm tra để không tự xóa tài khoản admin
        if (auth()->user()->id == $user->id) {
            return back()->with('error', 'Bạn không thể tự xóa chính mình.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Xóa người dùng thành công!');
    }
}