<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Kiểm tra xem người dùng đã đăng nhập chưa VÀ có phải là admin không
        if (Auth::check() && Auth::user()->isAdmin()) {
            // 2. Nếu đúng, cho phép
            return $next($request);
        }

        // 3. Nếu không phải admin chuyển hướng về trang chủ
        return redirect('/');
    }
}