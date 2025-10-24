<!-- Header -->
<header class="header">
  <div class="max-header">
    <div class="header-left">
      <a href="{{ url('user/homepage-user') }}" class="logo">
        <div class="logo-icon">
          <img src="{{ asset('images/iconstack.io - (Book).png') }}" alt="Thư viện Tri Thức logo" />
        </div>
        <div class="logo-text">Thư viện<br />Tri Thức</div>
      </a>

      <nav class="nav">
        <a href="{{ url('user/homepage-user') }}">Trang chủ
          <img src="{{ asset('images/iconstack.io - (Home).png') }}" alt="Trang chủ logo" />
        </a>
        <a href="{{ url('user/search-book-user') }}" class="active">Tra cứu sách
          <img src="{{ asset('images/iconstack.io - (Search)-purple.png') }}" alt="Tra cứu sách logo" />
        </a>
        <a href="{{ url('user/trangmuontra') }}">Mượn/ Trả sách
          <img src="{{ asset('images/iconstack.io - (Book 2).png') }}" alt="Mượn/ Trả sách logo" />
        </a>
        <a href="{{ url('user/datchosach') }}">Đặt chỗ
          <img src="{{ asset('images/iconstack.io - (Bookmark).png') }}" alt="Đặt chỗ logo" />
        </a>
        <a href="{{ url('user/tranglichsumuontra') }}">Lịch sử
          <img src="{{ asset('images/iconstack.io - (History).png') }}" alt="Lịch sử logo" />
        </a>
      </nav>
    </div>

    <div class="header-right">
      <div class="fine-box">
        <svg width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.5 8.5 0 0 1 8 8z"></path>
          <text x="10" y="14" font-size="8" font-weight="bold">$</text>
        </svg>
        <span class="fine-text">
          <span class="line1">Thanh toán</span>
          <span class="line2">tiền phạt</span>
        </span>
      </div>

      <div class="notification-icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"></path>
          <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
        </svg>
        <span class="badge">3</span>
      </div>

      <div class="user-box" onclick="togglePopup()">
        <svg width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <rect x="2" y="2" width="20" height="20" rx="10" ry="10"></rect>
          <circle cx="12" cy="9" r="3"></circle>
          <path d="M6 18c1.5-3 4.5-3 6-3s4.5 0 6 3"></path>
        </svg>

        <svg width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <line x1="12" y1="4" x2="12" y2="19" />
          <line x1="5" y1="12" x2="12" y2="19" />
          <line x1="19" y1="12" x2="12" y2="19" />
        </svg>
      </div>

      <div id="userPopup" class="popup">
        <div class="popup-header">
          <div class="avatar">N</div>
          <div class="info">
            <h3>Nguyễn Văn A</h3>
            <p>nguyenvana@email.com</p>
          </div>
        </div>

        <a href="{{ url('user/info-user') }}" class="popup-item-link">
          <div class="popup-item">
            <div class="icon-popup">
              <img src="{{ asset('images/iconstack.io - (Ic Fluent People Search 24 Filled)-popup.png') }}" alt="Thông tin tài khoản logo" />
            </div>
            <div>
              <strong>Thông tin tài khoản</strong>
              <p>Quản lý hồ sơ cá nhân</p>
            </div>
          </div>
        </a>

        <a href="{{ url('user/setting-user') }}" class="popup-item-link">
          <div class="popup-item">
            <div class="icon-popup">
              <img src="{{ asset('images/iconstack.io - (Lock Password)-popup.png') }}" alt="Đổi mật khẩu logo" />
            </div>
            <div>
              <strong>Đổi mật khẩu</strong>
              <p>Đổi mật khẩu tài khoản</p>
            </div>
          </div>
        </a>

        <a href="{{ url('user/help-user') }}" class="popup-item-link">
          <div class="popup-item">
            <div class="icon-popup">
              <img src="{{ asset('images/iconstack.io - (Question Bold)-popup.png') }}" alt="Trợ giúp logo" />
            </div>
            <div>
              <strong>Trợ giúp</strong>
              <p>Hướng dẫn sử dụng</p>
            </div>
          </div>
        </a>

        <a href="{{ url('user/homepage-login-user') }}" class="popup-item-link">
          <div class="popup-item logout">
            <div class="icon-popup">
              <img src="{{ asset('images/iconstack.io - (Log Out)-popup.png') }}" alt="Đăng xuất logo" />
            </div>
            <div>
              <strong>Đăng xuất</strong>
              <p>Thoát khỏi tài khoản</p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div>
</header>
