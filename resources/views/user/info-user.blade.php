<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thông tin cá nhân - Người dùng</title>

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('css/styleguide.css') }}">
  <link rel="stylesheet" href="{{ asset('css/globals.css') }}">
  <link rel="stylesheet" href="{{ asset('css/info-user.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-info-user.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer_login-admin.css') }}">
</head>

<body>
  <div class="page-container">
    {{-- Include Header --}}
    @include('user.layouts.header-info-user')

    <div class="title-box">
      <h2 class="main-title">Thông tin tài khoản</h2>
      <p class="sub-title">Quản lý thông tin cá nhân</p>
    </div>

    <div class="profile-card">
      <div class="profile-header">
        <h2>Thông tin cá nhân</h2>
        <button class="edit-btn" onclick="enableEdit()">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M12 20h9" />
            <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z" />
          </svg>

          Chỉnh sửa
        </button>
        
        <button class="save-btn" onclick="saveInfo()">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
            <polyline points="17 21 17 13 7 13 7 21"></polyline>
            <polyline points="7 3 7 8 15 8"></polyline>
          </svg>

          Lưu
        </button>
      </div>

      <div class="form-group">
        <label>Họ và tên</label>
        <div class="form-input">
          <input type="text" id="name" disabled>
        </div>
      </div>    

      <div class="form-group">
        <label>Số điện thoại</label>
        <div class="form-input">
          <input type="text" id="phone" disabled>
        </div>
      </div>

      <div class="form-group">
        <label>Email</label>
        <div class="form-input">
          <input type="email" id="email" disabled>
        </div>
      </div>

      <div class="form-group">
        <label>Địa chỉ</label>
        <div class="form-input">
          <input type="text" id="address" disabled>
        </div>
      </div>
    </div>

    {{-- Include Footer --}}
    @include('user.layouts.footer-login-user')
  </div>

  {{-- Script --}}
  <script src="{{ asset('js/info-user-edit.js') }}"></script>
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
