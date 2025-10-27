<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng ký Người dùng</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/signup-user.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/header_login-admin.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/footer_login-admin.css') }}" />
</head>
<body>
    <div class="page-container">

        {{-- Header --}}
        @include('user.layouts.header-signup-user')

        {{-- Sign Up Content --}}
        <main class="login-box">
            <div class="avatar">
                <div class="avatar-icon">
                    <img src="{{ asset('images/iconstack.io - (People Fill)-blue.png') }}" alt="Người dùng logo" />
                </div>
            </div>

            <h1>Đăng ký</h1>
            <p class="desc">Tạo tài khoản người dùng mới để sử dụng thư viện</p>

            <form class="login-form" action="{{ url('/user/signup') }}" method="POST">
                @csrf

                {{-- Họ và tên --}}
                <label for="fullname">Họ và tên</label>
                <div class="input-box">
                    <input type="text" name="fullname" id="fullname" placeholder="Nhập họ và tên" required />
                </div>

                {{-- Email --}}
                <label for="email">Email</label>
                <div class="input-box">
                    <input type="email" name="email" id="email" placeholder="Nhập email của bạn" required />
                </div>

                {{-- Số điện thoại --}}
                <label for="phone">Số điện thoại</label>
                <div class="input-box">
                    <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại" required />
                </div>

                {{-- Địa chỉ --}}
                <label for="address">Địa chỉ</label>
                <div class="input-box">
                    <input type="text" name="address" id="address" placeholder="Nhập địa chỉ" required />
                </div>

                {{-- Mật khẩu --}}
                <label for="password">Mật khẩu</label>
                <div class="input-box">
                    <div class="password-wrapper">
                        <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" required />
                        <button type="button" class="pwd-toggle" aria-label="Hiện/ẩn mật khẩu">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z" stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="3" stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Xác nhận mật khẩu --}}
                <label for="confirm-password">Xác nhận mật khẩu</label>
                <div class="input-box">
                    <div class="password-wrapper">
                        <input type="password" name="password_confirmation" id="confirm-password" placeholder="Nhập lại mật khẩu" required />
                        <button type="button" class="pwd-toggle" aria-label="Hiện/ẩn mật khẩu">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z" stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="3" stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Submit --}}
                <a href="{{ url('/user/signup-successful-user') }}" class="btn-login">Đăng ký</a>
            </form>
        </main>

        {{-- Footer --}}
        @include('user.layouts.footer-login-user')
    </div>

    <script defer src="{{ asset('js/password-toggle.js') }}"></script>
</body>
</html>
