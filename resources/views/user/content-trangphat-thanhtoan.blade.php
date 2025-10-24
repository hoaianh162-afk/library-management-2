<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán tiền phạt thành công - Thư viện Tri thức</title>

    {{-- Giữ lại 3 file CSS chính --}}
    <link rel="stylesheet" href="{{ asset('css/tranglichsumuontra-v2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trangphat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/trangphat-thanhtoan.css') }}">
</head>
<body>
    <div class="rectangle">
        <div class="group-ngoai-khoi-sach">
            <div class="rectangle-da-thanh-toan">
                <img class="img-da-thanh-toan" src="{{ asset('images/tick-xanh-thanh-toan-done.png') }}" alt="Thanh toán thành công">
                
                <div class="text-da-thanh-toan">Thanh toán thành công!</div>

                <div class="ghi-chu-da-thanh-toan">
                    Tiền phạt của bạn đã được thanh toán thành công. 
                    Cảm ơn bạn đã sử dụng dịch vụ thư viện.
                </div>
                
                <a class="rectangle-xem-lich-su-thanh-toan ve-trang-chu" href="{{ url('homepage-user') }}">
                    <div class="text-xem-ls text-ve-trang-chu">Về trang chủ</div>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
