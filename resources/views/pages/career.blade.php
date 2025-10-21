@extends('layouts.app')

@section('title', 'Tuyển dụng - FPT Shop')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-red-600 mb-6 border-b pb-4">Cơ hội nghề nghiệp tại FPT Shop</h1>
        
        <!-- Banner -->
        <div class="mb-8 relative overflow-hidden rounded-lg">
            <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2022/1/4/637769104775673825_career-banner.jpg" 
                 alt="Tuyển dụng FPT Shop" class="w-full h-auto">
            <div class="absolute inset-0 bg-gradient-to-r from-red-600/70 to-transparent flex items-center">
                <div class="p-8 md:w-1/2">
                    <h2 class="text-white text-3xl font-bold mb-4">Khởi đầu sự nghiệp cùng FPT Shop</h2>
                    <p class="text-white text-lg">Môi trường năng động, chuyên nghiệp với nhiều cơ hội phát triển</p>
                </div>
            </div>
        </div>
        
        <!-- Vì sao chọn FPT Shop -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Vì sao chọn FPT Shop?</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md transition">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Cơ hội thăng tiến</h3>
                    <p class="text-gray-600">Lộ trình thăng tiến rõ ràng, cơ hội phát triển dựa trên năng lực và kết quả công việc.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md transition">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Đãi ngộ hấp dẫn</h3>
                    <p class="text-gray-600">Chế độ lương thưởng cạnh tranh, phúc lợi đầy đủ và nhiều chương trình đãi ngộ đặc biệt.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg hover:shadow-md transition">
                    <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Môi trường chuyên nghiệp</h3>
                    <p class="text-gray-600">Làm việc trong môi trường chuyên nghiệp, năng động và thân thiện. Được đào tạo bài bản.</p>
                </div>
            </div>
        </section>
        
        <!-- Vị trí đang tuyển -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Vị trí đang tuyển dụng</h2>
            
            <div class="space-y-4">
                <!-- Vị trí 1 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="font-semibold text-xl text-red-600">Nhân viên bán hàng</h3>
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Toàn quốc</span>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-3 text-sm text-gray-600">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                7-12 triệu
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Hạn nộp: 30/11/2025
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-700">Tư vấn, giới thiệu sản phẩm và bán hàng cho khách tại cửa hàng. Cập nhật thông tin sản phẩm mới, giải đáp thắc mắc và hỗ trợ khách hàng.</p>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Ứng tuyển ngay
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Vị trí 2 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="font-semibold text-xl text-red-600">Quản lý cửa hàng</h3>
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Hà Nội, HCM</span>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-3 text-sm text-gray-600">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                15-25 triệu
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Hạn nộp: 15/11/2025
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-700">Quản lý hoạt động kinh doanh của cửa hàng. Đảm bảo doanh số, chất lượng dịch vụ và quản lý nhân viên. Báo cáo kết quả kinh doanh định kỳ.</p>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Ứng tuyển ngay
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Vị trí 3 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="font-semibold text-xl text-red-600">Chuyên viên Marketing Digital</h3>
                            <span class="bg-green-100 text-green-800 text-xs font-semibold px-2.5 py-0.5 rounded">Hà Nội</span>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-3 text-sm text-gray-600">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                12-20 triệu
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Hạn nộp: 20/11/2025
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-gray-700">Lên kế hoạch và thực hiện các chiến dịch Digital Marketing. Quản lý nội dung website, social media và các kênh truyền thông online khác.</p>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <a href="#" class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                Ứng tuyển ngay
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Quy trình tuyển dụng -->
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Quy trình tuyển dụng</h2>
            <div class="flex flex-col md:flex-row items-center">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 w-full">
                    <div class="flex flex-col items-center text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4 text-xl font-bold text-red-600">1</div>
                        <h3 class="font-semibold mb-2">Nộp hồ sơ</h3>
                        <p class="text-sm text-gray-600">Ứng viên nộp CV trực tuyến hoặc tại cửa hàng</p>
                    </div>
                    
                    <div class="flex flex-col items-center text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4 text-xl font-bold text-red-600">2</div>
                        <h3 class="font-semibold mb-2">Phỏng vấn</h3>
                        <p class="text-sm text-gray-600">Phỏng vấn trực tiếp với quản lý trực tiếp</p>
                    </div>
                    
                    <div class="flex flex-col items-center text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4 text-xl font-bold text-red-600">3</div>
                        <h3 class="font-semibold mb-2">Đánh giá</h3>
                        <p class="text-sm text-gray-600">Đánh giá năng lực và kiểm tra lý lịch</p>
                    </div>
                    
                    <div class="flex flex-col items-center text-center p-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mb-4 text-xl font-bold text-red-600">4</div>
                        <h3 class="font-semibold mb-2">Nhận việc</h3>
                        <p class="text-sm text-gray-600">Ký hợp đồng và tham gia đào tạo</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA -->
        <section class="bg-red-50 p-8 rounded-lg text-center">
            <h2 class="text-2xl font-semibold mb-4 text-red-600">Sẵn sàng tham gia đội ngũ FPT Shop?</h2>
            <p class="text-gray-700 mb-6 max-w-2xl mx-auto">Hãy gửi CV của bạn ngay hôm nay và trở thành một phần của đội ngũ FPT Shop. Chúng tôi luôn chào đón những tài năng mới!</p>
            <a href="#" class="inline-block px-6 py-3 bg-red-600 text-white font-semibold rounded-lg hover:bg-red-700 transition">
                Tìm kiếm cơ hội nghề nghiệp
            </a>
        </section>
    </div>
</div>
@endsection