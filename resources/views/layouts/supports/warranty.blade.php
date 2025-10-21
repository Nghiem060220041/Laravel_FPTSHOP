@extends('layouts.app')

@section('title', 'Chính sách bảo hành - FPT Shop')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-red-600 mb-6 border-b pb-4">Chính sách bảo hành</h1>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Thông tin chung về chính sách bảo hành</h2>
            <p class="mb-4 text-gray-700">FPT Shop cam kết mang đến cho khách hàng sự an tâm tuyệt đối khi mua sắm tại hệ thống cửa hàng của chúng tôi thông qua các chính sách bảo hành rõ ràng, minh bạch và có lợi cho khách hàng.</p>
            <div class="grid md:grid-cols-3 gap-6 mt-6">
                <div class="bg-gray-50 p-6 rounded-lg text-center">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium mb-2">Bảo hành chính hãng</h3>
                    <p class="text-gray-700">Sản phẩm được bảo hành theo chính sách của hãng và các trung tâm bảo hành được ủy quyền.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg text-center">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium mb-2">Thời gian xử lý nhanh</h3>
                    <p class="text-gray-700">FPT Shop cam kết thời gian tiếp nhận và xử lý bảo hành nhanh chóng, giúp khách hàng tiết kiệm thời gian.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg text-center">
                    <div class="flex justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-medium mb-2">Hỗ trợ kỹ thuật</h3>
                    <p class="text-gray-700">Đội ngũ kỹ thuật viên chuyên nghiệp sẵn sàng tư vấn và hỗ trợ khắc phục sự cố 24/7.</p>
                </div>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Thời gian và điều kiện bảo hành</h2>
            
            <div class="overflow-x-auto mb-6">
                <table class="min-w-full bg-white border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-3 px-4 border-b font-semibold text-left">Nhóm sản phẩm</th>
                            <th class="py-3 px-4 border-b font-semibold text-center">Thời gian bảo hành</th>
                            <th class="py-3 px-4 border-b font-semibold text-center">Điều kiện áp dụng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-4 px-4 border-b font-medium">Điện thoại, Máy tính bảng</td>
                            <td class="py-4 px-4 border-b text-center">12 tháng</td>
                            <td class="py-4 px-4 border-b">Các lỗi về phần cứng do nhà sản xuất</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 border-b font-medium">Laptop, Máy tính để bàn</td>
                            <td class="py-4 px-4 border-b text-center">12 - 36 tháng (tùy hãng)</td>
                            <td class="py-4 px-4 border-b">Các lỗi về phần cứng do nhà sản xuất</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 border-b font-medium">Phụ kiện điện tử</td>
                            <td class="py-4 px-4 border-b text-center">3 - 12 tháng</td>
                            <td class="py-4 px-4 border-b">Lỗi kỹ thuật không sửa chữa được</td>
                        </tr>
                        <tr>
                            <td class="py-4 px-4 border-b font-medium">Đồng hồ thông minh</td>
                            <td class="py-4 px-4 border-b text-center">12 tháng</td>
                            <td class="py-4 px-4 border-b">Lỗi kỹ thuật, phần cứng</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="bg-blue-50 p-6 rounded-lg">
                <h3 class="text-xl font-medium mb-3 text-blue-800">Điều kiện bảo hành</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Sản phẩm còn trong thời hạn bảo hành (tính từ ngày mua hàng).</li>
                    <li>Sản phẩm phải còn nguyên tem bảo hành, tem sản phẩm hoặc các dấu hiệu nhận biết sản phẩm.</li>
                    <li>Sản phẩm không bị biến dạng, trầy xước, bể vỡ, mốc, rỉ, sét do điều kiện bảo quản không tốt.</li>
                    <li>Sản phẩm không bị hư hỏng do thiên tai, hỏa hoạn, lụt lội, sử dụng nguồn điện không ổn định hoặc do vận chuyển không đúng cách.</li>
                    <li>Sản phẩm bị hư hỏng do lỗi của nhà sản xuất.</li>
                </ul>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Các trường hợp không được bảo hành</h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-red-50 p-6 rounded-lg">
                    <h3 class="text-xl font-medium mb-3 text-red-800">Không đủ điều kiện bảo hành</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                        <li>Sản phẩm hết thời hạn bảo hành.</li>
                        <li>Không có tem bảo hành, tem bị rách, tem bị sửa đổi hoặc mất phiếu bảo hành.</li>
                        <li>Số serial, model sản phẩm không khớp với phiếu bảo hành.</li>
                        <li>Phiếu bảo hành không ghi rõ ngày mua hàng.</li>
                    </ul>
                </div>
                
                <div class="bg-red-50 p-6 rounded-lg">
                    <h3 class="text-xl font-medium mb-3 text-red-800">Lỗi do người dùng</h3>
                    <ul class="list-disc list-inside space-y-2 text-gray-700">
                        <li>Sản phẩm bị hư hỏng do sử dụng sai hướng dẫn.</li>
                        <li>Sản phẩm bị rơi, va đập, bể vỡ, cong vênh, trầy xước, móp méo, biến dạng.</li>
                        <li>Sản phẩm bị hư hỏng do cháy nổ, hỏa hoạn, thiên tai, động vật phá hoại.</li>
                        <li>Sản phẩm bị ẩm, ngấm nước hoặc các chất lỏng khác.</li>
                        <li>Sản phẩm bị hư hỏng do vi phạm điều kiện bảo quản theo hướng dẫn của nhà sản xuất.</li>
                        <li>Sản phẩm đã bị thay đổi, sửa chữa bởi người dùng hoặc các cơ sở không được ủy quyền.</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Quy trình bảo hành sản phẩm</h2>
            
            <div class="relative">
                <!-- Timeline line -->
                <div class="absolute left-5 inset-y-0 w-0.5 bg-gray-200 md:left-1/2"></div>
                
                <!-- Timeline items -->
                <div class="space-y-6">
                    <!-- Step 1 -->
                    <div class="relative flex items-center justify-between md:justify-normal">
                        <div class="z-10 flex items-center justify-center w-10 h-10 bg-red-600 rounded-full md:order-1 md:ml-8">
                            <span class="text-white font-bold">1</span>
                        </div>
                        <div class="bg-white p-4 rounded shadow md:w-5/12 md:order-0 md:text-right">
                            <h3 class="font-bold text-lg mb-1">Kiểm tra thông tin bảo hành</h3>
                            <p class="text-gray-700">Khách hàng kiểm tra thời hạn bảo hành của sản phẩm trên website hoặc liên hệ tổng đài 1800 1234.</p>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="relative flex items-center justify-between md:justify-normal md:flex-row-reverse">
                        <div class="z-10 flex items-center justify-center w-10 h-10 bg-red-600 rounded-full md:order-1 md:mr-8">
                            <span class="text-white font-bold">2</span>
                        </div>
                        <div class="bg-white p-4 rounded shadow md:w-5/12 md:order-0 md:text-left">
                            <h3 class="font-bold text-lg mb-1">Gửi sản phẩm bảo hành</h3>
                            <p class="text-gray-700">Khách hàng mang sản phẩm đến cửa hàng FPT Shop gần nhất hoặc các trung tâm bảo hành ủy quyền kèm phiếu bảo hành/hóa đơn mua hàng.</p>
                        </div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="relative flex items-center justify-between md:justify-normal">
                        <div class="z-10 flex items-center justify-center w-10 h-10 bg-red-600 rounded-full md:order-1 md:ml-8">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <div class="bg-white p-4 rounded shadow md:w-5/12 md:order-0 md:text-right">
                            <h3 class="font-bold text-lg mb-1">Kiểm tra và xác nhận lỗi</h3>
                            <p class="text-gray-700">Nhân viên kỹ thuật sẽ kiểm tra tình trạng và xác nhận lỗi sản phẩm, sau đó tiếp nhận bảo hành nếu đủ điều kiện.</p>
                        </div>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="relative flex items-center justify-between md:justify-normal md:flex-row-reverse">
                        <div class="z-10 flex items-center justify-center w-10 h-10 bg-red-600 rounded-full md:order-1 md:mr-8">
                            <span class="text-white font-bold">4</span>
                        </div>
                        <div class="bg-white p-4 rounded shadow md:w-5/12 md:order-0 md:text-left">
                            <h3 class="font-bold text-lg mb-1">Sửa chữa hoặc thay thế</h3>
                            <p class="text-gray-700">Sản phẩm được sửa chữa hoặc thay thế linh kiện theo quy định của nhà sản xuất.</p>
                        </div>
                    </div>
                    
                    <!-- Step 5 -->
                    <div class="relative flex items-center justify-between md:justify-normal">
                        <div class="z-10 flex items-center justify-center w-10 h-10 bg-red-600 rounded-full md:order-1 md:ml-8">
                            <span class="text-white font-bold">5</span>
                        </div>
                        <div class="bg-white p-4 rounded shadow md:w-5/12 md:order-0 md:text-right">
                            <h3 class="font-bold text-lg mb-1">Thông báo hoàn thành</h3>
                            <p class="text-gray-700">FPT Shop sẽ thông báo cho khách hàng khi hoàn thành bảo hành qua SMS hoặc gọi điện.</p>
                        </div>
                    </div>
                    
                    <!-- Step 6 -->
                    <div class="relative flex items-center justify-between md:justify-normal md:flex-row-reverse">
                        <div class="z-10 flex items-center justify-center w-10 h-10 bg-red-600 rounded-full md:order-1 md:mr-8">
                            <span class="text-white font-bold">6</span>
                        </div>
                        <div class="bg-white p-4 rounded shadow md:w-5/12 md:order-0 md:text-left">
                            <h3 class="font-bold text-lg mb-1">Nhận lại sản phẩm</h3>
                            <p class="text-gray-700">Khách hàng nhận lại sản phẩm đã được bảo hành tại cửa hàng hoặc được giao hàng tận nơi tùy khu vực.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section>
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Các trung tâm bảo hành</h2>
            
            <div class="grid md:grid-cols-2 gap-6">
                <div class="border rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-3">Trung tâm bảo hành FPT Service - Hà Nội</h3>
                        <div class="space-y-2">
                            <p class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Số 36 Phố Lê Thanh Nghị, Phường Bách Khoa, Quận Hai Bà Trưng, Hà Nội</span>
                            </p>
                            <p class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>1800 1234</span>
                            </p>
                            <p class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Giờ làm việc: 8:00 - 21:30 (Thứ 2 - Chủ nhật)</span>
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="border rounded-lg overflow-hidden">
                    <div class="p-6">
                        <h3 class="font-bold text-lg mb-3">Trung tâm bảo hành FPT Service - TP. HCM</h3>
                        <div class="space-y-2">
                            <p class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Số 63 Phạm Ngọc Thạch, Phường 6, Quận 3, TP. Hồ Chí Minh</span>
                            </p>
                            <p class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>1800 1234</span>
                            </p>
                            <p class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>Giờ làm việc: 8:00 - 21:30 (Thứ 2 - Chủ nhật)</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection