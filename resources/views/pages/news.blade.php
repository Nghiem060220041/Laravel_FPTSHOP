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
                        <img src="data:image/jpeg;base64,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HvUS6qsxw/aze2V62GTdY/3xVfqZ/TH7ST/UcgxVc91oPevsj14ZGXGzRcrSPdO27gF6xA6eK2WxiMcyd5/BaFU+6g1URFQREQEREBERAREQEREBERAREQbdDv8AFb4UfRfit8FBkBX26x3XwuQWjY+S2b67fcuhxT6Bct2cmtf67VfGVOgUVOCoWGqqdFG+dLVqqtBVtq5rzxf384KPMibRy3mjP97wtPpF0jhltGReHSLX6ReDImxN7PTWe7vZ7yrA+dU/CJbOPe33lTjp1znlr4bcky0aiZY3zLUmlQfDL1lXqp/Wf9d/3ipR8mq0KaIOkeXei1zie05jYIFHh5f1ndVvtPd8VtSPawWYLe/xX2qqvDsUbNKg8zzXWo8r09yxlVHxERAREQEREBERAREQEREBERAREQbFK73reBUbBLlN7A9h3LZNaD823cUGzdfC5a/nY5H2L4aocigksOmIOnMFXiOpuAeYBXOaXEejcHNF+YO4jkpiPalo/wAM27CEFwdUrUnqFXDtSz6DvWFiftIw/Md7FB4x5/XYe/8ABaokSqxVj/mHxstR1YL7rdy1A2y9eS9annQ5FPOhyKI3qWYg6dh9SmhNoqzBXZHBzRu4HcRyK33420m+QjussyqUdKsEj1oHF2cnez4rw7FGcnez4orLUOPBa7ZLB/a439ZP4r5+UWg3APs+KxVNW15vYtPG1rHwRH2Wa613OXwSDmfUPihl7f5WqjGSvK9OP92XlAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREBERAREQEREH/2Q==" 
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
                        <img src="https://cdn2.fptshop.com.vn/unsafe/828x0/filters:format(webp):quality(75)/638290127288249053_samsung_galaxy_z_fold5_5_d04bebe9cf.jpg" 
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
                        <img src="https://cdn.tgdd.vn//News/1173869//23-730x408-1.jpg" 
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
                                    <img src="https://happyphone.vn/wp-content/uploads/2024/11/Macbook-Air-M3-13-inch-co-bo-khung-vo-kim-loai-sang-trong-1024x576.jpg" 
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
                                    <img src="https://cdn.tgdd.vn/News/1561740/GHN3m9ZXIAAWwBX-1280x720.jpg" 
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