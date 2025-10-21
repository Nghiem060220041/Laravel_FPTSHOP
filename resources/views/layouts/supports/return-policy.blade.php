@extends('layouts.app')

@section('title', 'Chính sách đổi trả - FPT Shop')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-red-600 mb-6 border-b pb-4">Chính sách đổi trả</h1>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Quy định chung về đổi trả</h2>
            <div class="bg-gray-50 p-5 rounded-lg mb-6">
                <p class="text-gray-700 mb-4">FPT Shop cam kết đảm bảo quyền lợi của khách hàng trong việc đổi/trả sản phẩm. Chúng tôi luôn hướng đến việc cung cấp sản phẩm chất lượng và dịch vụ hoàn hảo.</p>
                <p class="text-gray-700">Với chính sách đổi trả linh hoạt, khách hàng có thể hoàn toàn yên tâm khi mua sắm tại FPT Shop.</p>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Chính sách đổi trả sản phẩm mới</h2>
            
            <div class="grid md:grid-cols-2 gap-6 mb-6">
                <div class="border border-green-200 rounded-lg p-5">
                    <h3 class="text-xl font-semibold mb-3 text-green-700">Đổi mới trong 30 ngày đầu tiên</h3>
                    <p class="mb-3 text-gray-700">Áp dụng cho các sản phẩm lỗi do nhà sản xuất trong 30 ngày đầu kể từ ngày mua.</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-700">
                        <li>Sản phẩm còn nguyên vẹn, không trầy xước</li>
                        <li>Đầy đủ hộp, phụ kiện kèm theo</li>
                        <li>Có hóa đơn mua hàng từ FPT Shop</li>
                        <li>Lỗi được xác nhận bởi kỹ thuật viên của FPT Shop</li>
                    </ul>
                </div>
                
                <div class="border border-blue-200 rounded-lg p-5">
                    <h3 class="text-xl font-semibold mb-3 text-blue-700">Trả sản phẩm và hoàn tiền</h3>
                    <p class="mb-3 text-gray-700">Áp dụng trong các trường hợp đặc biệt khi không thể đổi sản phẩm mới hoặc theo yêu cầu của khách hàng.</p>
                    <ul class="list-disc list-inside space-y-1 text-gray-700">
                        <li>Thời gian áp dụng: trong vòng 15 ngày kể từ ngày mua</li>
                        <li>Sản phẩm còn nguyên vẹn, không trầy xước</li>
                        <li>Đầy đủ hộp, phụ kiện kèm theo</li>
                        <li>Có thể áp dụng phí hoàn trả theo quy định</li>
                    </ul>
                </div>
            </div>
            
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-5">
                <h3 class="text-xl font-semibold mb-3 text-yellow-700">Lưu ý quan trọng</h3>
                <ul class="list-disc list-inside space-y-2 text-gray-700">
                    <li>FPT Shop <span class="font-semibold">không chấp nhận đổi trả</span> với lý do "không thích, không phù hợp nhu cầu, đổi ý..."</li>
                    <li>Sản phẩm đổi mới sẽ có thời hạn bảo hành được tính từ thời điểm mua sản phẩm đầu tiên</li>
                    <li>Mỗi sản phẩm chỉ được đổi 1 lần duy nhất</li>
                    <li>Trường hợp không có sản phẩm đổi tương đương, FPT Shop sẽ hoàn trả tiền hoặc đổi sang sản phẩm khác có thu thêm hoặc trả lại tiền chênh lệch</li>
                </ul>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Quy trình đổi trả</h2>
            
            <div class="overflow-x-auto mb-6">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="py-3 px-4 border-b border-r border-gray-200 bg-gray-50 text-left">Bước</th>
                            <th class="py-3 px-4 border-b border-r border-gray-200 bg-gray-50 text-left">Mô tả</th>
                            <th class="py-3 px-4 border-b border-gray-200 bg-gray-50 text-left">Yêu cầu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-4 border-b border-r border-gray-200 font-semibold">Bước 1</td>
                            <td class="py-3 px-4 border-b border-r border-gray-200">Liên hệ FPT Shop</td>
                            <td class="py-3 px-4 border-b border-gray-200">Qua hotline 1800 1234 hoặc đến trực tiếp cửa hàng</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 border-b border-r border-gray-200 font-semibold">Bước 2</td>
                            <td class="py-3 px-4 border-b border-r border-gray-200">Kiểm tra điều kiện đổi trả</td>
                            <td class="py-3 px-4 border-b border-gray-200">Nhân viên sẽ kiểm tra sản phẩm và các điều kiện liên quan</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 border-b border-r border-gray-200 font-semibold">Bước 3</td>
                            <td class="py-3 px-4 border-b border-r border-gray-200">Xác nhận và thực hiện đổi/trả</td>
                            <td class="py-3 px-4 border-b border-gray-200">Nếu đủ điều kiện, FPT Shop sẽ tiến hành đổi sản phẩm hoặc hoàn tiền</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 border-r border-gray-200 font-semibold">Bước 4</td>
                            <td class="py-3 px-4 border-r border-gray-200">Hoàn tất thủ tục</td>
                            <td class="py-3 px-4">Khách hàng nhận sản phẩm mới hoặc tiền hoàn lại</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Chính sách đổi trả theo nhóm sản phẩm</h2>
            
            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg">
                    <div class="p-4 bg-gray-50 font-semibold">Điện thoại, Máy tính bảng</div>
                    <div class="p-4 border-t border-gray-200">
                        <ul class="list-disc list-inside space-y-1">
                            <li>Đổi mới trong 30 ngày đầu tiên nếu có lỗi phần cứng từ nhà sản xuất</li>
                            <li>Từ ngày 31 trở đi: áp dụng chính sách bảo hành</li>
                            <li>Hoàn tiền trong 15 ngày với mức phí 20% giá trị sản phẩm</li>
                        </ul>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg">
                    <div class="p-4 bg-gray-50 font-semibold">Laptop, Máy tính để bàn</div>
                    <div class="p-4 border-t border-gray-200">
                        <ul class="list-disc list-inside space-y-1">
                            <li>Đổi mới trong 30 ngày đầu tiên nếu có từ 3 điểm chết trên màn hình hoặc lỗi phần cứng từ nhà sản xuất</li>
                            <li>Từ ngày 31 trở đi: áp dụng chính sách bảo hành</li>
                            <li>Hoàn tiền trong 15 ngày với mức phí 20% giá trị sản phẩm</li>
                        </ul>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg">
                    <div class="p-4 bg-gray-50 font-semibold">Phụ kiện</div>
                    <div class="p-4 border-t border-gray-200">
                        <ul class="list-disc list-inside space-y-1">
                            <li>Đổi mới trong 7 ngày đầu tiên nếu có lỗi từ nhà sản xuất</li>
                            <li>Không áp dụng đổi trả với phụ kiện đã qua sử dụng</li>
                            <li>Một số phụ kiện như tai nghe, ốp lưng không áp dụng đổi trả vì lý do vệ sinh</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="mb-8">
            <h2 class="text-2xl font-semibold mb-4 text-gray-800">Câu hỏi thường gặp</h2>
            
            <div class="space-y-4">
                <div class="border border-gray-200 rounded-lg">
                    <div class="p-4 cursor-pointer bg-gray-50 font-semibold">
                        Tôi mua hàng online tại FPT Shop, có được áp dụng chính sách đổi trả không?
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <p>Có, chính sách đổi trả áp dụng cho cả khách hàng mua trực tuyến và mua tại cửa hàng. Đối với mua online, thời gian sẽ được tính từ ngày bạn nhận hàng (có xác nhận giao hàng).</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg">
                    <div class="p-4 cursor-pointer bg-gray-50 font-semibold">
                        Tôi đã mở hộp và sử dụng sản phẩm, có được đổi trả không?
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <p>Nếu sản phẩm bị lỗi do nhà sản xuất và đáp ứng các điều kiện đổi trả, bạn vẫn được áp dụng chính sách đổi trả. Tuy nhiên, sản phẩm cần đảm bảo không bị trầy xước, hư hỏng do quá trình sử dụng.</p>
                    </div>
                </div>
                
                <div class="border border-gray-200 rounded-lg">
                    <div class="p-4 cursor-pointer bg-gray-50 font-semibold">
                        Nếu không có hóa đơn mua hàng, tôi có thể đổi trả không?
                    </div>
                    <div class="p-4 border-t border-gray-200">
                        <p>FPT Shop yêu cầu khách hàng cung cấp hóa đơn mua hàng hoặc thông tin đơn hàng khi thực hiện đổi trả. Trong trường hợp không có hóa đơn, bạn có thể cung cấp thông tin như số điện thoại, email đã đăng ký để nhân viên kiểm tra trong hệ thống.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <h3 class="text-lg font-semibold mb-2 text-red-700">Liên hệ hỗ trợ đổi trả</h3>
            <p class="mb-2">Để được hỗ trợ về vấn đề đổi trả sản phẩm, vui lòng liên hệ:</p>
            <ul class="list-disc list-inside">
                <li>Hotline: <span class="font-semibold">1800 1234</span> (miễn phí)</li>
                <li>Email: hotro@fptshop.com.vn</li>
                <li>Mang sản phẩm đến cửa hàng FPT Shop gần nhất</li>
            </ul>
        </div>
    </div>
</div>
@endsection

