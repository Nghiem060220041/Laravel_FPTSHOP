<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        <div>
            <h3 class="text-lg font-semibold mb-4">Về FPT Shop</h3>
            <ul class="space-y-2">
                <li><a href="{{ url('/about') }}" class="text-gray-300 hover:text-white">Giới thiệu</a></li>
                <li><a href="{{ url('/career') }}" class="text-gray-300 hover:text-white">Tuyển dụng</a></li>
                <li><a href="{{ url('/news') }}" class="text-gray-300 hover:text-white">Tin tức</a></li>
                <li><a href="{{ url('/contact') }}" class="text-gray-300 hover:text-white">Liên hệ</a></li>
            </ul>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold mb-4">Hỗ trợ khách hàng</h3>
            <ul class="space-y-2">
                <li><a href="{{ route('support.installment') }}" class="text-gray-300 hover:text-white">Tìm hiểu về mua trả góp</a></li>
                <li><a href="{{ route('support.warranty') }}" class="text-gray-300 hover:text-white">Chính sách bảo hành</a></li>
                <li><a href="{{ route('support.return-policy') }}" class="text-gray-300 hover:text-white">Chính sách đổi trả</a></li>
                <li><a href="{{ route('support.shipping-payment') }}" class="text-gray-300 hover:text-white">Giao hàng & Thanh toán</a></li>
            </ul>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold mb-4">Tổng đài hỗ trợ</h3>
            <ul class="space-y-2">
                <li>Gọi mua: <span class="font-bold">1800 1234</span> (8h00 - 22h00)</li>
                <li>Kỹ thuật: <span class="font-bold">1800 5678</span> (8h00 - 21h30)</li>
                <li>Khiếu nại: <span class="font-bold">1800 9012</span> (8h00 - 21h30)</li>
            </ul>
        </div>
        
        <div>
            <h3 class="text-lg font-semibold mb-4">Kết nối với chúng tôi</h3>
            <div class="flex space-x-4 mb-4">
                <a href="#" class="text-white hover:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                    </svg>
                </a>
                <a href="#" class="text-white hover:text-red-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                    </svg>
                </a>
            </div>
            <h3 class="text-lg font-semibold mb-4">Phương thức thanh toán</h3>
            <div class="grid grid-cols-3 gap-2">
                <img alt="VISA" loading="lazy" width="60" height="45" decoding="async" data-nimg="1" srcset="https://cdn2.fptshop.com.vn/svg/visa_icon_44fe6e15ed.svg 1x, https://cdn2.fptshop.com.vn/svg/visa_icon_44fe6e15ed.svg 2x" src="https://cdn2.fptshop.com.vn/svg/visa_icon_44fe6e15ed.svg" style="color: transparent;">
                <img alt="MasterCard" loading="lazy" width="60" height="45" decoding="async" data-nimg="1" srcset="https://cdn2.fptshop.com.vn/svg/mastercard_icon_c75f94f6a5.svg 1x, https://cdn2.fptshop.com.vn/svg/mastercard_icon_c75f94f6a5.svg 2x" src="https://cdn2.fptshop.com.vn/svg/mastercard_icon_c75f94f6a5.svg" style="color: transparent;">
                <img alt="JCB" loading="lazy" width="60" height="45" decoding="async" data-nimg="1" srcset="https://cdn2.fptshop.com.vn/svg/jcb_icon_214783937c.svg 1x, https://cdn2.fptshop.com.vn/svg/jcb_icon_214783937c.svg 2x" src="https://cdn2.fptshop.com.vn/svg/jcb_icon_214783937c.svg" style="color: transparent;">
                <img alt="MoMo" loading="lazy" width="60" height="45" decoding="async" data-nimg="1" srcset="https://cdn2.fptshop.com.vn/svg/momo_icon_baef21b5f7.svg 1x, https://cdn2.fptshop.com.vn/svg/momo_icon_baef21b5f7.svg 2x" src="https://cdn2.fptshop.com.vn/svg/momo_icon_baef21b5f7.svg" style="color: transparent;">
                <img alt="ZaloPay" loading="lazy" width="60" height="45" decoding="async" data-nimg="1" srcset="https://cdn2.fptshop.com.vn/svg/zalopay_icon_26d64ea93f.svg 1x, https://cdn2.fptshop.com.vn/svg/zalopay_icon_26d64ea93f.svg 2x" src="https://cdn2.fptshop.com.vn/svg/zalopay_icon_26d64ea93f.svg" style="color: transparent;">
                <img alt="VNPAY" loading="lazy" width="60" height="45" decoding="async" data-nimg="1" srcset="https://cdn2.fptshop.com.vn/svg/vnpay_icon_f42045057d.svg 1x, https://cdn2.fptshop.com.vn/svg/vnpay_icon_f42045057d.svg 2x" src="https://cdn2.fptshop.com.vn/svg/vnpay_icon_f42045057d.svg" style="color: transparent;">
            </div>
        </div>
    </div>
    
    <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
        <p>© {{ date('Y') }} FPTShop. Tất cả các quyền được bảo lưu.</p>
        <p class="mt-2">Địa chỉ: Tòa nhà FPT Cầu Giấy, số 17 Duy Tân, Cầu Giấy, Hà Nội</p>
        <p class="mt-2">Mã số doanh nghiệp: 0101243863 do Sở Kế hoạch & Đầu tư TP Hà Nội cấp lần đầu ngày 03/01/2007</p>
        <p class="mt-2">Điện thoại: 0974629044. Email: nghiemle0602@gmail.com. Chịu trách nhiệm nội dung: Lê Văn Nghiêm</p>
    </div>
</div>