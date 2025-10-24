<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Người dùng</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset('css/login-user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header_login-admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer_login-admin.css') }}">

</head>
<body>
    <div class="page-container">
        
        {{-- Header --}}
        @include('user.layouts.header-login-user')

        {{-- Nội dung đăng nhập --}}
        <main class="login-box">
            <div class="avatar">
                <div class="avatar-icon">
                    <img src="{{ asset('images/iconstack.io - (People Fill)-blue.png') }}" alt="Người dùng logo">
                </div>
            </div>
            <h1>Đăng nhập</h1>
            <p class="desc">Đăng nhập vào tài khoản của bạn để tiếp tục</p>

            <form class="login-form" action="{{ url('/user/homepage-user') }}">
                @csrf

                {{-- Email --}}
                <label for="email">Email</label>
                <div class="input-box">
                    <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
                </div>

                {{-- Password --}}
                <label for="password">Mật khẩu</label>
                <div class="input-box">
                    <div class="password-wrapper">
                        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
                        <button type="button" class="pwd-toggle" aria-label="Hiện/ẩn mật khẩu">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z" stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="12" r="3" stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-login">Đăng nhập</button>
            </form>
        </main>

        {{-- Footer --}}
        @include('user.layouts.footer-login-user')
    </div>

    {{-- JS --}}
    <script defer src="{{ asset('js/password-toggle.js') }}"></script>
</body>
</html>
