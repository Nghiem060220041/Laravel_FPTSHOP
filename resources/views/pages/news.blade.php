@extends('layouts.app')

@section('title', 'Tin tức - FPT Shop')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-red-600 mb-6 border-b pb-4">Tin tức & Sự kiện</h1>
        
        <!-- Tin tức nổi bật -->
        <section class="mb-10">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Tin tức nổi bật</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Bài viết nổi bật 1 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <a href="#">
                        <img src="https://images.fpt.shop/unsafe/fit-in/490x326/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/10/18/638332768083449334_iphone-15-pro-max.jpg" 
                             alt="iPhone 15 Pro Max" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-4">
                        <div class="flex items-center text-xs text-gray-500 mb-2">
                            <span>18/10/2025</span>
                            <span class="mx-2">•</span>
                            <span>Công nghệ</span>
                        </div>
                        <a href="#" class="block mb-2">
                            <h3 class="font-semibold text-lg hover:text-red-600 transition">iPhone 15 Pro Max vẫn là smartphone bán chạy nhất tại Việt Nam</h3>
                        </a>
                        <p class="text-gray-600 text-sm">Theo báo cáo mới nhất, iPhone 15 Pro Max tiếp tục dẫn đầu thị trường smartphone cao cấp tại Việt Nam trong quý 3/2025.</p>
                        <a href="#" class="mt-3 inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                            Đọc thêm
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Bài viết nổi bật 2 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <a href="#">
                        <img src="https://images.fpt.shop/unsafe/fit-in/490x326/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/10/18/638332579566233777_samsung-galaxy-z-fold-5.jpg" 
                             alt="Samsung Galaxy Z Fold 5" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-4">
                        <div class="flex items-center text-xs text-gray-500 mb-2">
                            <span>15/10/2025</span>
                            <span class="mx-2">•</span>
                            <span>Đánh giá</span>
                        </div>
                        <a href="#" class="block mb-2">
                            <h3 class="font-semibold text-lg hover:text-red-600 transition">Đánh giá Galaxy Z Fold 5: Sự hoàn thiện của smartphone màn hình gập</h3>
                        </a>
                        <p class="text-gray-600 text-sm">Samsung Galaxy Z Fold 5 mang đến những cải tiến đáng kể về độ bền và trải nghiệm người dùng so với thế hệ trước.</p>
                        <a href="#" class="mt-3 inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                            Đọc thêm
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Bài viết nổi bật 3 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-md">
                    <a href="#">
                        <img src="https://images.fpt.shop/unsafe/fit-in/490x326/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/7/25/638258962810512024_laptop.jpg" 
                             alt="Laptop gaming" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-4">
                        <div class="flex items-center text-xs text-gray-500 mb-2">
                            <span>10/10/2025</span>
                            <span class="mx-2">•</span>
                            <span>Tư vấn</span>
                        </div>
                        <a href="#" class="block mb-2">
                            <h3 class="font-semibold text-lg hover:text-red-600 transition">Top 5 laptop gaming đáng mua nhất năm 2025</h3>
                        </a>
                        <p class="text-gray-600 text-sm">Với sự phát triển mạnh mẽ của thị trường gaming, các laptop gaming ngày càng được cải tiến về hiệu năng và thiết kế.</p>
                        <a href="#" class="mt-3 inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                            Đọc thêm
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Danh mục tin tức -->
        <section class="mb-10">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Danh sách tin tức -->
                <div class="md:w-2/3">
                    <h2 class="text-2xl font-semibold mb-6 text-gray-800">Tin tức mới nhất</h2>
                    
                    <div class="space-y-6">
                        <!-- Tin tức 1 -->
                        <div class="flex flex-col md:flex-row gap-4 pb-6 border-b">
                            <div class="md:w-1/3">
                                <a href="#">
                                    <img src="https://images.fpt.shop/unsafe/fit-in/240x160/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/10/5/638321132061537281_macbook-air-m3.jpg" 
                                         alt="MacBook Air M3" class="w-full h-40 object-cover rounded">
                                </a>
                            </div>
                            <div class="md:w-2/3">
                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                    <span>05/10/2025</span>
                                    <span class="mx-2">•</span>
                                    <span>Sản phẩm mới</span>
                                </div>
                                <a href="#" class="block mb-2">
                                    <h3 class="font-semibold text-xl hover:text-red-600 transition">Apple ra mắt MacBook Air M3: Mỏng hơn, mạnh hơn và thời lượng pin ấn tượng</h3>
                                </a>
                                <p class="text-gray-600">MacBook Air M3 mới được Apple giới thiệu với thiết kế mỏng nhẹ hơn, hiệu năng mạnh mẽ từ chip M3 và thời lượng pin lên đến 18 giờ.</p>
                                <a href="#" class="mt-3 inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                                    Đọc thêm
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Tin tức 2 -->
                        <div class="flex flex-col md:flex-row gap-4 pb-6 border-b">
                            <div class="md:w-1/3">
                                <a href="#">
                                    <img src="https://images.fpt.shop/unsafe/fit-in/240x160/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/10/3/638319404303647932_xiaomi-14.jpg" 
                                         alt="Xiaomi 14 Series" class="w-full h-40 object-cover rounded">
                                </a>
                            </div>
                            <div class="md:w-2/3">
                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                    <span>03/10/2025</span>
                                    <span class="mx-2">•</span>
                                    <span>Tin tức</span>
                                </div>
                                <a href="#" class="block mb-2">
                                    <h3 class="font-semibold text-xl hover:text-red-600 transition">Xiaomi 14 series ra mắt tại Việt Nam: Camera Leica, sạc nhanh 120W</h3>
                                </a>
                                <p class="text-gray-600">Xiaomi vừa chính thức ra mắt dòng smartphone cao cấp Xiaomi 14 series tại Việt Nam với nhiều cải tiến về camera và sạc nhanh.</p>
                                <a href="#" class="mt-3 inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                                    Đọc thêm
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Tin tức 3 -->
                        <div class="flex flex-col md:flex-row gap-4 pb-6 border-b">
                            <div class="md:w-1/3">
                                <a href="#">
                                    <img src="https://images.fpt.shop/unsafe/fit-in/240x160/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/28/638315671307169140_fpt-shop-khai-truong.jpg" 
                                         alt="FPT Shop mở rộng" class="w-full h-40 object-cover rounded">
                                </a>
                            </div>
                            <div class="md:w-2/3">
                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                    <span>28/09/2025</span>
                                    <span class="mx-2">•</span>
                                    <span>FPT Shop</span>
                                </div>
                                <a href="#" class="block mb-2">
                                    <h3 class="font-semibold text-xl hover:text-red-600 transition">FPT Shop khai trương 10 cửa hàng mới trong tháng 9/2025</h3>
                                </a>
                                <p class="text-gray-600">Tiếp tục chiến lược mở rộng hệ thống bán lẻ, FPT Shop đã khai trương thêm 10 cửa hàng mới tại nhiều tỉnh thành trong tháng 9/2025.</p>
                                <a href="#" class="mt-3 inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                                    Đọc thêm
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        
                        <!-- Tin tức 4 -->
                        <div class="flex flex-col md:flex-row gap-4 pb-6 border-b">
                            <div class="md:w-1/3">
                                <a href="#">
                                    <img src="https://images.fpt.shop/unsafe/fit-in/240x160/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/25/638313107219724880_smart-tv.jpg" 
                                         alt="Smart TV" class="w-full h-40 object-cover rounded">
                                </a>
                            </div>
                            <div class="md:w-2/3">
                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                    <span>25/09/2025</span>
                                    <span class="mx-2">•</span>
                                    <span>Tư vấn</span>
                                </div>
                                <a href="#" class="block mb-2">
                                    <h3 class="font-semibold text-xl hover:text-red-600 transition">Hướng dẫn chọn mua Smart TV phù hợp cho gia đình</h3>
                                </a>
                                <p class="text-gray-600">Bài viết chia sẻ các tiêu chí quan trọng khi chọn mua Smart TV như kích thước, độ phân giải, công nghệ hình ảnh và âm thanh.</p>
                                <a href="#" class="mt-3 inline-flex items-center text-sm font-medium text-red-600 hover:underline">
                                    Đọc thêm
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Phân trang -->
                    <div class="mt-8 flex justify-center">
                        <nav class="inline-flex rounded-md shadow">
                            <a href="#" class="px-3 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                Trước
                            </a>
                            <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-red-600 hover:bg-red-50">
                                1
                            </a>
                            <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                2
                            </a>
                            <a href="#" class="px-3 py-2 border-t border-b border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                3
                            </a>
                            <a href="#" class="px-3 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                Sau
                            </a>
                        </nav>
                    </div>
                </div>
                
                <!-- Sidebar -->
                <div class="md:w-1/3">
                    <!-- Danh mục -->
                    <div class="bg-gray-50 p-6 rounded-lg mb-6">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800">Danh mục</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="flex items-center text-gray-700 hover:text-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Tin công nghệ
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-gray-700 hover:text-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Đánh giá sản phẩm
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-gray-700 hover:text-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Hướng dẫn & Thủ thuật
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-gray-700 hover:text-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Tin khuyến mãi
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center text-gray-700 hover:text-red-600 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                    Tin FPT Shop
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Bài viết phổ biến -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-4 text-gray-800">Bài viết phổ biến</h3>
                        <div class="space-y-4">
                            <div class="flex gap-3">
                                <a href="#" class="flex-shrink-0">
                                    <img src="https://images.fpt.shop/unsafe/fit-in/80x80/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/20/638308799603022356_top-dien-thoai.jpg" 
                                         alt="Top điện thoại" class="w-16 h-16 object-cover rounded">
                                </a>
                                <div>
                                    <a href="#" class="text-sm font-medium hover:text-red-600 transition">Top 10 điện thoại bán chạy nhất tháng 9/2025</a>
                                    <p class="text-xs text-gray-500 mt-1">20/09/2025</p>
                                </div>
                            </div>
                            
                            <div class="flex gap-3">
                                <a href="#" class="flex-shrink-0">
                                    <img src="https://images.fpt.shop/unsafe/fit-in/80x80/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/15/638304580091116097_apple-watch-series-9.jpg" 
                                         alt="Apple Watch" class="w-16 h-16 object-cover rounded">
                                </a>
                                <div>
                                    <a href="#" class="text-sm font-medium hover:text-red-600 transition">Đánh giá Apple Watch Series 9: Có nên nâng cấp không?</a>
                                    <p class="text-xs text-gray-500 mt-1">15/09/2025</p>
                                </div>
                            </div>
                            
                            <div class="flex gap-3">
                                <a href="#" class="flex-shrink-0">
                                    <img src="https://images.fpt.shop/unsafe/fit-in/80x80/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/10/638300433504670831_ipad-mini.jpg" 
                                         alt="iPad mini" class="w-16 h-16 object-cover rounded">
                                </a>
                                <div>
                                    <a href="#" class="text-sm font-medium hover:text-red-600 transition">5 lý do nên mua iPad mini cho công việc và giải trí</a>
                                    <p class="text-xs text-gray-500 mt-1">10/09/2025</p>
                                </div>
                            </div>
                            
                            <div class="flex gap-3">
                                <a href="#" class="flex-shrink-0">
                                    <img src="https://images.fpt.shop/unsafe/fit-in/80x80/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/9/5/638296324598034647_laptop-gaming.jpg" 
                                         alt="Laptop gaming" class="w-16 h-16 object-cover rounded">
                                </a>
                                <div>
                                    <a href="#" class="text-sm font-medium hover:text-red-600 transition">So sánh laptop gaming dưới 25 triệu: ASUS TUF vs Acer Nitro</a>
                                    <p class="text-xs text-gray-500 mt-1">05/09/2025</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection