@extends('layouts.app')

@section('title', 'Giao hàng & Thanh toán - FPT Shop')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-red-600 mb-6 border-b pb-4">Giao hàng & Thanh toán</h1>
        
        <div class="space-y-8">
            <section>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Phương thức giao hàng</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <div class="flex items-start mb-4">
                            <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center mr-4">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Nhận tại cửa hàng</h3>
                                <p class="text-gray-600">Nhận sản phẩm trực tiếp tại cửa hàng FPT Shop gần nhất</p>
                            </div>
                        </div>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            <li>Miễn phí</li>
                            <li>Nhận hàng ngay sau khi thanh toán</li>
                            <li>Kiểm tra sản phẩm trực tiếp trước khi nhận</li>
                            <li>Được hướng dẫn sử dụng sản phẩm</li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <div class="flex items-start mb-4">
                            <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center mr-4">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Giao hàng tận nơi</h3>
                                <p class="text-gray-600">Giao hàng tận nơi trên toàn quốc</p>
                            </div>
                        </div>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            <li>Miễn phí giao hàng trong bán kính 20km (giá trị đơn hàng từ 500.000đ)</li>
                            <li>Phí vận chuyển từ 20.000đ - 100.000đ tùy khu vực và sản phẩm</li>
                            <li>Thời gian giao hàng: 1-3 ngày (nội thành), 3-7 ngày (các tỉnh)</li>
                            <li>Kiểm tra sản phẩm khi nhận hàng</li>
                        </ul>
                    </div>
                </div>
            </section>
            
            <section>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Thời gian giao hàng</h2>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b border-gray-200 bg-gray-100 text-left">Khu vực</th>
                                <th class="px-4 py-2 border-b border-gray-200 bg-gray-100 text-left">Thời gian giao hàng</th>
                                <th class="px-4 py-2 border-b border-gray-200 bg-gray-100 text-left">Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200">Nội thành Hà Nội, TP.HCM</td>
                                <td class="px-4 py-2 border-b border-gray-200">1 - 2 ngày</td>
                                <td class="px-4 py-2 border-b border-gray-200">Có thể giao trong ngày với đơn hàng trước 12h</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200">Các thành phố lớn</td>
                                <td class="px-4 py-2 border-b border-gray-200">2 - 3 ngày</td>
                                <td class="px-4 py-2 border-b border-gray-200">Đà Nẵng, Cần Thơ, Hải Phòng, Nha Trang...</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200">Các tỉnh, thành khác</td>
                                <td class="px-4 py-2 border-b border-gray-200">3 - 7 ngày</td>
                                <td class="px-4 py-2 border-b border-gray-200">Tùy thuộc vào khoảng cách địa lý</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-2 border-b border-gray-200">Vùng sâu, vùng xa</td>
                                <td class="px-4 py-2 border-b border-gray-200">5 - 10 ngày</td>
                                <td class="px-4 py-2 border-b border-gray-200">Có thể kéo dài hơn trong mùa mưa bão</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-gray-500 text-sm italic mt-2">* Thời gian giao hàng có thể thay đổi do điều kiện thời tiết, giao thông hoặc các sự kiện bất khả kháng khác.</p>
            </section>
            
            <section>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Phương thức thanh toán</h2>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <div class="flex items-start mb-4">
                            <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center mr-4">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Thanh toán tiền mặt</h3>
                                <p class="text-gray-600">Thanh toán khi nhận hàng hoặc tại cửa hàng</p>
                            </div>
                        </div>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            <li>Thanh toán tại cửa hàng FPT Shop</li>
                            <li>Thanh toán khi nhận hàng (COD)</li>
                            <li>An toàn, đơn giản, không cần thẻ hay tài khoản ngân hàng</li>
                            <li>Được kiểm tra hàng trước khi thanh toán</li>
                        </ul>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                        <div class="flex items-start mb-4">
                            <div class="h-12 w-12 rounded-full bg-red-100 flex items-center justify-center mr-4">
                                <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Thanh toán thẻ/chuyển khoản</h3>
                                <p class="text-gray-600">Thanh toán online qua thẻ hoặc chuyển khoản</p>
                            </div>
                        </div>
                        <ul class="list-disc pl-5 space-y-2 text-gray-600">
                            <li>Thẻ ATM nội địa/Internet Banking (miễn phí thanh toán)</li>
                            <li>Thẻ tín dụng/ghi nợ quốc tế (Visa, Mastercard, JCB)</li>
                            <li>Thanh toán qua ví điện tử (Momo, ZaloPay, VNPay...)</li>
                            <li>Chuyển khoản ngân hàng</li>
                        </ul>
                    </div>
                </div>
                
                <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                    <h3 class="text-lg font-semibold text-blue-700 mb-2">Trả góp</h3>
                    <p class="text-gray-600 mb-4">FPT Shop hỗ trợ mua trả góp với nhiều hình thức linh hoạt:</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <h4 class="font-semibold text-gray-700 mb-2">Trả góp qua thẻ tín dụng</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Chuyển đổi trả góp 0% lãi suất</li>
                                <li>Kỳ hạn: 3, 6, 9, 12 tháng</li>
                                <li>Áp dụng cho thẻ của nhiều ngân hàng</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-700 mb-2">Trả góp qua công ty tài chính</h4>
                            <ul class="list-disc pl-5 text-gray-600 space-y-1">
                                <li>Thủ tục đơn giản: CMND + Bằng lái/Hộ khẩu</li>
                                <li>Kỳ hạn: 6-24 tháng</li>
                                <li>Xét duyệt nhanh trong 15-30 phút</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            
            <section>
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Chính sách đổi trả và hoàn tiền</h2>
                <div class="bg-gray-50 p-6 rounded-lg border border-gray-200">
                    <ul class="list-disc pl-5 space-y-3 text-gray-700">
                        <li><span class="font-semibold">Đổi mới trong 30 ngày</span> nếu sản phẩm lỗi do nhà sản xuất</li>
                        <li><span class="font-semibold">Hoàn tiền trong 7 ngày</span> nếu sản phẩm không đúng như mô tả</li>
                        <li>Hoàn tiền qua phương thức khách hàng đã thanh toán ban đầu</li>
                        <li>Thời gian xử lý hoàn tiền: 5-7 ngày làm việc sau khi yêu cầu được chấp thuận</li>
                        <li>Miễn phí giao hàng cho sản phẩm đổi/trả nếu lỗi thuộc về FPT Shop hoặc nhà sản xuất</li>
                    </ul>
                    <p class="mt-4 text-sm text-gray-500 italic">* Chi tiết vui lòng xem thêm tại <a href="#" class="text-red-600 hover:underline">Chính sách đổi trả</a></p>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection