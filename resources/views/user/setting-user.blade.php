<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đổi mật khẩu - Người dùng</title>

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/styleguide.css') }}">
  <link rel="stylesheet" href="{{ asset('css/globals.css') }}">
  <link rel="stylesheet" href="{{ asset('css/setting-user.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-info-user.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer_login-admin.css') }}">
</head>

<body>
  <div class="page-container">
    {{-- Include Header --}}
    @include('user.layouts.header-info-user')

    {{-- Main Content --}}
    <div class="title-box">
      <h2 class="main-title">Đổi mật khẩu</h2>
      <p class="sub-title">Đổi mật khẩu cho tài khoản của bạn</p>
    </div>

    <div class="change-pw-container">
      <div class="change-password-container">
        <div class="title">
          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24"
               fill="none" stroke="#3259E5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="7.5" cy="7.5" r="3.5"></circle>
            <path d="M10 10l5 5"></path>
            <path d="M15 15l2 2"></path>
            <path d="M17 17l2-2"></path>
          </svg>
          Đổi mật khẩu
        </div>

        {{-- Form đổi mật khẩu --}}
        <div class="form-group">
          <label>Mật khẩu hiện tại</label>
          <div class="password-wrapper">
            <i>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                   viewBox="0 0 24 24" aria-hidden="true">
                <g fill="none" stroke="#888888" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M7 10V7a5 5 0 0 1 10 0v3" />
                  <rect x="5" y="10" width="14" height="11" rx="2" />
                  <circle cx="12" cy="15.5" r="1.5" fill="#888888" />
                </g>
              </svg>
            </i>

            <input type="password" id="password" placeholder="Nhập mật khẩu hiện tại">
            <button type="button" class="pwd-toggle" aria-label="Hiện/ẩn mật khẩu">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                   xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z"
                      stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="12" cy="12" r="3"
                        stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>

        <div class="form-group">
          <label>Mật khẩu mới</label>
          <div class="password-wrapper">
            <i>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                   viewBox="0 0 24 24" aria-hidden="true">
                <g fill="none" stroke="#888888" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M7 10V7a5 5 0 0 1 10 0v3" />
                  <rect x="5" y="10" width="14" height="11" rx="2" />
                  <circle cx="12" cy="15.5" r="1.5" fill="#888888" />
                </g>
              </svg>
            </i>

            <input type="password" id="newPassword" placeholder="Nhập mật khẩu mới">
            <button type="button" class="pwd-toggle" aria-label="Hiện/ẩn mật khẩu">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                   xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z"
                      stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="12" cy="12" r="3"
                        stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>

        <div class="form-group">
          <label>Xác nhận mật khẩu mới</label>
          <div class="password-wrapper">
            <i>
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                   viewBox="0 0 24 24" aria-hidden="true">
                <g fill="none" stroke="#888888" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M7 10V7a5 5 0 0 1 10 0v3" />
                  <rect x="5" y="10" width="14" height="11" rx="2" />
                  <circle cx="12" cy="15.5" r="1.5" fill="#888888" />
                </g>
              </svg>
            </i>

            <input type="password" id="confirmPassword" placeholder="Xác nhận lại mật khẩu mới">
            <button type="button" class="pwd-toggle" aria-label="Hiện/ẩn mật khẩu">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                   xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path d="M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12z"
                      stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="12" cy="12" r="3"
                        stroke="#333" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>

        <button onclick="changePassword()">Đổi mật khẩu</button>
        <div class="message" id="messageBox"></div>
      </div>
    </div>

    {{-- Include Footer --}}
    @include('user.layouts.footer-homepage-login-user')
  </div>

  {{-- Scripts --}}
  <script src="{{ asset('js/setting-user-reset-pw.js') }}"></script>
  <script src="{{ asset('js/password-toggle.js') }}"></script>
  <script>
    function togglePopup() {
      const popup = document.getElementById("userPopup");
      popup.style.display = popup.style.display === "block" ? "none" : "block";
    }

    window.onclick = function(event) {
      if (!event.target.closest('.user-box') && !event.target.closest('#userPopup')) {
        document.getElementById("userPopup").style.display = "none";
      }
    }
  </script>
</body>
</html>
