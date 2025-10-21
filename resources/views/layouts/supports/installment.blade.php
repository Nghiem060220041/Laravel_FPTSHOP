@extends('layouts.app')

@section('title', 'Tìm hiểu về mua trả góp - FPT Shop')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-red-600 mb-6 border-b pb-4">Tìm hiểu về mua trả góp</h1>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Lợi ích khi mua trả góp tại FPT Shop</h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold">Thủ tục đơn giản</h3>
                    </div>
                    <p class="text-gray-700">Chỉ cần CCCD và số điện thoại, duyệt khoản vay nhanh chóng trong vòng 5-15 phút.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold">Lãi suất ưu đãi</h3>
                    </div>
                    <p class="text-gray-700">Nhiều gói trả góp 0%, giảm áp lực tài chính với các khoản góp hàng tháng dễ dàng thanh toán.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold">Không cần chứng minh thu nhập</h3>
                    </div>
                    <p class="text-gray-700">Không cần giấy tờ chứng minh thu nhập, tạo điều kiện thuận lợi cho mọi đối tượng khách hàng.</p>
                </div>
                
                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="bg-red-100 p-3 rounded-full mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold">Thời gian linh hoạt</h3>
                    </div>
                    <p class="text-gray-700">Kỳ hạn trả góp linh hoạt từ 6-24 tháng tùy theo nhu cầu và khả năng tài chính của khách hàng.</p>
                </div>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Điều kiện mua trả góp</h2>
            
            <div class="bg-blue-50 p-6 rounded-lg mb-6">
                <h3 class="text-xl font-medium mb-3 text-blue-800">Đối tượng áp dụng</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>Công dân Việt Nam từ 20-60 tuổi</li>
                    <li>Có CMND/CCCD còn hiệu lực</li>
                    <li>Có số điện thoại chính chủ</li>
                </ul>
            </div>
            
            <div class="bg-blue-50 p-6 rounded-lg">
                <h3 class="text-xl font-medium mb-3 text-blue-800">Giấy tờ cần chuẩn bị</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>CMND/CCCD bản gốc còn hiệu lực</li>
                    <li>Số điện thoại chính chủ (đã đăng ký với nhà mạng)</li>
                    <li>Một số đối tác tài chính có thể yêu cầu hộ khẩu hoặc giấy phép lái xe (tùy từng trường hợp)</li>
                </ul>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Quy trình mua trả góp</h2>
            
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
                            <h3 class="font-bold text-lg mb-1">Chọn sản phẩm và phương thức trả góp</h3>
                            <p class="text-gray-700">Lựa chọn sản phẩm và đối tác tài chính phù hợp với nhu cầu của bạn.</p>
                        </div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="relative flex items-center justify-between md:justify-normal md:flex-row-reverse">
                        <div class="z-10 flex items-center justify-center w-10 h-10 bg-red-600 rounded-full md:order-1 md:mr-8">
                            <span class="text-white font-bold">2</span>
                        </div>
                        <div class="bg-white p-4 rounded shadow md:w-5/12 md:order-0 md:text-left">
                            <h3 class="font-bold text-lg mb-1">Chuẩn bị giấy tờ và đặt cọc</h3>
                            <p class="text-gray-700">Chuẩn bị CMND/CCCD và đặt cọc trước tối thiểu 10% giá trị sản phẩm.</p>
                        </div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="relative flex items-center justify-between md:justify-normal">
                        <div class="z-10 flex items-center justify-center w-10 h-10 bg-red-600 rounded-full md:order-1 md:ml-8">
                            <span class="text-white font-bold">3</span>
                        </div>
                        <div class="bg-white p-4 rounded shadow md:w-5/12 md:order-0 md:text-right">
                            <h3 class="font-bold text-lg mb-1">Duyệt hồ sơ trả góp</h3>
                            <p class="text-gray-700">Đối tác tài chính sẽ thẩm định và duyệt khoản vay trong vòng 15 phút.</p>
                        </div>
                    </div>
                    
                    <!-- Step 4 -->
                    <div class="relative flex items-center justify-between md:justify-normal md:flex-row-reverse">
                        <div class="z-10 flex items-center justify-center w-10 h-10 bg-red-600 rounded-full md:order-1 md:mr-8">
                            <span class="text-white font-bold">4</span>
                        </div>
                        <div class="bg-white p-4 rounded shadow md:w-5/12 md:order-0 md:text-left">
                            <h3 class="font-bold text-lg mb-1">Ký hợp đồng và nhận sản phẩm</h3>
                            <p class="text-gray-700">Hoàn tất thủ tục, ký kết hợp đồng và nhận sản phẩm ngay tại cửa hàng.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Đối tác tài chính</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="flex justify-center items-center border p-4 rounded-lg hover:shadow-md transition-shadow">
                    <img src="https://thebank.vn/uploads/2020/05/10/thebank_logonganhangfecredit_1589123561.png" alt="FE Credit" class="h-12">
                </div>
                <div class="flex justify-center items-center border p-4 rounded-lg hover:shadow-md transition-shadow">
                    <img src="https://is1-ssl.mzstatic.com/image/thumb/Purple221/v4/61/41/d2/6141d24a-3bef-52de-87be-73f5486f751c/AppIcon-prodvn-1x_U007emarketing-0-8-0-85-220-0.png/1200x600wa.png" alt="Home Credit" class="h-12">
                </div>
                <div class="flex justify-center items-center border p-4 rounded-lg hover:shadow-md transition-shadow">
                    <img src="https://play-lh.googleusercontent.com/VDI5x77r3qsK0QtIKZNGJJ3GFNv3As1xh5FsHjvVsw4K_6mmMHHDURNsnY_2f5SGZv6M=w600-h300-pc0xffffff-pd" alt="MCredit" class="h-12">
                </div>
                <div class="flex justify-center items-center border p-4 rounded-lg hover:shadow-md transition-shadow">
                    <img src="https://media.loveitopcdn.com/3807/logo-tpbank-2.jpg" alt="TPBank" class="h-12">
                </div>
            </div>
        </section>
        
        <section>
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Câu hỏi thường gặp</h2>
            
            <div class="space-y-4">
                <div class="border rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>Mua trả góp tại FPT Shop có cần thẻ tín dụng không?</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 py-4 bg-gray-50">
                        <p class="text-gray-700">Không cần. Khách hàng chỉ cần CCCD và số điện thoại chính chủ là có thể đăng ký mua trả góp tại FPT Shop thông qua các công ty tài chính liên kết.</p>
                    </div>
                </div>
                
                <div class="border rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>Tôi có thể trả trước bao nhiêu phần trăm?</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 py-4 bg-gray-50">
                        <p class="text-gray-700">Khách hàng có thể trả trước tối thiểu 10% giá trị sản phẩm. Tùy vào chương trình và đối tác tài chính, tỷ lệ trả trước có thể từ 10-70% giá trị sản phẩm.</p>
                    </div>
                </div>
                
                <div class="border rounded-lg overflow-hidden">
                    <button class="flex justify-between items-center w-full px-6 py-4 text-left font-medium text-gray-800 hover:bg-gray-50 focus:outline-none">
                        <span>Tôi có thể trả trước hạn không?</span>
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 py-4 bg-gray-50">
                        <p class="text-gray-700">Có, bạn có thể thanh toán trước hạn khoản vay của mình. Tuy nhiên, có thể phải chịu một khoản phí trả trước hạn theo quy định của từng công ty tài chính.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection