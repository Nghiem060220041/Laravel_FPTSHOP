@extends('layouts.app')

@section('title', 'Đặt hàng thành công')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-12 text-center">
        <h1 class="text-4xl font-bold text-green-500 mb-4">Đặt hàng thành công!</h1>
        <p class="text-lg text-gray-700 mb-6">Cảm ơn bạn đã mua hàng. Đơn hàng của bạn đang được xử lý.</p>
        @if(session('order_id'))
            <p class="mb-4">Mã đơn hàng của bạn là: <strong class="text-blue-500">#{{ session('order_id') }}</strong></p>
        @endif
        <a href="{{ route('home') }}" class="inline-block bg-blue-500 text-white font-bold py-3 px-6 rounded hover:bg-blue-600">
            Tiếp tục mua sắm
        </a>
    </div>
@endsection