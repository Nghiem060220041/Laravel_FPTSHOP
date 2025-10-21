@extends('layouts.app')

@section('title', 'Giới thiệu - FPT Shop')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-red-600 mb-6 border-b pb-4">Giới thiệu về FPT Shop</h1>
        
        <section class="mb-8">
            <div class="flex flex-col md:flex-row gap-8">
                <div class="md:w-1/2">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Lịch sử phát triển</h2>
                    <p class="text-gray-700 mb-4">FPT Shop là nhà bán lẻ thuộc Công ty Cổ phần Bán lẻ Kỹ thuật số FPT (gọi tắt là FPT Retail), thành lập từ năm 2012 với sứ mệnh mang đến cho người tiêu dùng Việt Nam những sản phẩm công nghệ chính hãng với chất lượng và dịch vụ hàng đầu.</p>
                    <p class="text-gray-700 mb-4">Sau hơn 10 năm phát triển, FPT Shop đã trở thành nhà bán lẻ hàng đầu trong lĩnh vực công nghệ với hơn 750 cửa hàng trên toàn quốc, đáp ứng nhu cầu mua sắm của hàng triệu khách hàng mỗi năm.</p>
                </div>
                <div class="md:w-1/2">
                    <img src="https://images.fpt.shop/unsafe/fit-in/1200x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/7/1/638238629808234212_fpt-shop-khai-truong.jpg" 
                         alt="FPT Shop" class="rounded-lg shadow-md w-full h-auto">
                </div>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Tầm nhìn & Sứ mệnh</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold mb-3 text-red-600">Tầm nhìn</h3>
                    <p class="text-gray-700">Trở thành nhà bán lẻ số 1 Việt Nam trong lĩnh vực công nghệ, mang đến trải nghiệm mua sắm tốt nhất và sản phẩm chất lượng cao cho người tiêu dùng.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-xl font-semibold mb-3 text-red-600">Sứ mệnh</h3>
                    <p class="text-gray-700">Giúp người Việt tiếp cận với những sản phẩm công nghệ tiên tiến, chính hãng với giá cả hợp lý cùng dịch vụ chăm sóc khách hàng tận tâm.</p>
                </div>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Giá trị cốt lõi</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="border border-gray-200 p-6 rounded-lg text-center hover:shadow-md transition">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Uy tín</h3>
                    <p class="text-gray-600">Cam kết chỉ bán hàng chính hãng, đảm bảo chất lượng và nguồn gốc sản phẩm rõ ràng.</p>
                </div>
                
                <div class="border border-gray-200 p-6 rounded-lg text-center hover:shadow-md transition">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Nhanh chóng</h3>
                    <p class="text-gray-600">Đáp ứng nhanh chóng mọi nhu cầu của khách hàng từ tư vấn đến giao hàng và hậu mãi.</p>
                </div>
                
                <div class="border border-gray-200 p-6 rounded-lg text-center hover:shadow-md transition">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Tận tâm</h3>
                    <p class="text-gray-600">Luôn đặt khách hàng làm trung tâm, mang đến trải nghiệm mua sắm tốt nhất với sự tận tâm.</p>
                </div>
            </div>
        </section>
        
        <section>
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Thành tựu nổi bật</h2>
            <div class="space-y-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-6 w-6 rounded-full bg-red-600 flex items-center justify-center text-white font-semibold mr-3 mt-1">1</div>
                    <div>
                        <h3 class="font-semibold text-lg">Top 3 nhà bán lẻ điện thoại và điện máy lớn nhất Việt Nam</h3>
                        <p class="text-gray-600">Với hệ thống hơn 750 cửa hàng trên toàn quốc</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-6 w-6 rounded-full bg-red-600 flex items-center justify-center text-white font-semibold mr-3 mt-1">2</div>
                    <div>
                        <h3 class="font-semibold text-lg">Được vinh danh trong Top 500 nhà bán lẻ hàng đầu Châu Á - Thái Bình Dương</h3>
                        <p class="text-gray-600">Năm 2023, theo Retail Asia</p>
                    </div>
                </div>
                
                <div class="flex items-start">
                    <div class="flex-shrink-0 h-6 w-6 rounded-full bg-red-600 flex items-center justify-center text-white font-semibold mr-3 mt-1">3</div>
                    <div>
                        <h3 class="font-semibold text-lg">Đối tác chiến lược của các thương hiệu công nghệ hàng đầu thế giới</h3>
                        <p class="text-gray-600">Apple, Samsung, Xiaomi, OPPO, Dell, HP, Asus,...</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection