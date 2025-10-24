@include('user.layouts.header-homepage-login-user')

<!-- Hero Section -->
<section class="hero-bg">
  <h1><span>Chào mừng đến với</span>Thư viện Hiện đại</h1>
  <p>Khám phá kho tàng tri thức với hàng nghìn đầu sách đa dạng.<br>
  Mượn sách, đặt chỗ và quản lý thông tin một cách dễ dàng.</p>

  <div class="hero-buttons">
    <a href="#" class="btn primary-btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="11" cy="11" r="8"></circle>
        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
      </svg>
      Tra cứu sách
    </a>
    <a href="{{ url('/user/signup-user') }}" class="btn secondary-btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8">
        <circle cx="9" cy="7" r="4"/>
        <path d="M2 21v-1a7 7 0 0 1 14 0v1"/>
        <line x1="20" y1="8" x2="20" y2="14"/>
        <line x1="17" y1="11" x2="23" y2="11"/>
      </svg>
      Đăng ký thành viên
    </a>
  </div>
</section>

<!-- Stats Section -->
<section class="stats-container">
  <div class="stat-box-tongsosach">
    <div class="stat-icon"><img src="{{ asset('images/Tongsosach-blue-hp.png') }}"></div>
    <div class="stat-number">15,420</div>
    <div class="stat-title">Tổng số sách</div>
  </div>
  <div class="stat-box-docgiadangky">
    <div class="stat-icon"><img src="{{ asset('images/Docgiadangky-blue-hp.png') }}"></div>
    <div class="stat-number">2,847</div>
    <div class="stat-title">Độc giả đăng ký</div>
  </div>
  <div class="stat-box-luotmuonhomnay">
    <div class="stat-icon"><img src="{{ asset('images/Luotmuonhomnay-blue-hp.png') }}"></div>
    <div class="stat-number">1,234</div>
    <div class="stat-title">Lượt mượn hôm nay</div>
  </div>
  <div class="stat-box-sachdangmuon">
    <div class="stat-icon"><img src="{{ asset('images/Sachdangmuon-blue-hp.png') }}"></div>
    <div class="stat-number">89</div>
    <div class="stat-title">Sách đang mượn</div>
  </div>
</section>

<!-- Features Section -->
<section class="features-section">
  <h2>Tính năng nổi bật</h2>
  <p>Hệ thống quản lý thư viện với đầy đủ tính năng hiện đại, giúp bạn có trải nghiệm tốt nhất</p>

  <div class="features-grid">
    <a href="#" class="feature-link">
      <div class="feature-box">
        <div class="feature-icon">
          <img src="{{ asset('images/iconstack.io - (Search)-thin-white.png') }}" alt="Tra cứu sách">
        </div>
        <div class="feature-title">Tra cứu sách</div>
        <div class="feature-desc">Tìm kiếm sách theo tên, tác giả, thể loại một cách nhanh chóng và chính xác</div>
      </div>
    </a>

    <a href="#" class="feature-link">
      <div class="feature-box">
        <div class="feature-icon">
          <img src="{{ asset('images/iconstack.io - (Book 2)-thin-white.png') }}" alt="Mượn/Trả sách">
        </div>
        <div class="feature-title">Mượn/Trả sách</div>
        <div class="feature-desc">Quản lý việc mượn và trả sách dễ dàng, theo dõi hạn trả</div>
      </div>
    </a>

    <a href="#" class="feature-link">
      <div class="feature-box">
        <div class="feature-icon">
          <img src="{{ asset('images/iconstack.io - (Bookmark)-thin-white.png') }}" alt="Đặt chỗ">
        </div>
        <div class="feature-title">Đặt chỗ</div>
        <div class="feature-desc">Đặt trước những cuốn sách yêu thích khi chúng đang được đọc</div>
      </div>
    </a>

    <a href="#" class="feature-link">
      <div class="feature-box">
        <div class="feature-icon">
          <img src="{{ asset('images/iconstack.io - (History)-thin-white.png') }}" alt="Lịch sử">
        </div>
        <div class="feature-title">Lịch sử</div>
        <div class="feature-desc">Xem lịch sử mượn trả và theo dõi tình trạng</div>
      </div>
    </a>
  </div>
</section>

<!-- Favorite Books -->
<section class="favorite-books">
  <div class="section-header">
    <div>
      <h2>Sách được yêu thích</h2>
      <p>Những cuốn sách được mượn nhiều nhất trong tháng</p>
    </div>
    <a href="#" class="view-all">Xem tất cả →</a>
  </div>

  <div class="book-list">
    <div class="book-card">
      <div class="book-img">
        <img src="{{ asset('images/nhagiakim-bia.jpg') }}" alt="Nhà giả kim">
      </div>
      <div class="book-tag">Văn học</div>
      <h3 class="book-title">Nhà giả kim</h3>
      <p class="book-author">Tác giả: Paulo Coelho</p>
    </div>
    
    <div class="book-card">
          <div class="book-img">
            <img src="{{ asset('images/toithayhoavangtrencoxanh-bia.jpg') }}" alt="Tôi thấy hoa vàng trên cỏ xanh">
          </div>
          <div class="book-tag">Văn học</div>
          <h3 class="book-title">Tôi thấy hoa vàng trên cỏ xanh</h3>
          <p class="book-author">Tác giả: Nguyễn Nhật Ánh</p>
        </div>

        <div class="book-card">
          <div class="book-img">
            <img src="{{ asset('images/atomichabits-bia.webp') }}" alt="Atomic Habits">
          </div>
          <div class="book-tag purple">Phát triển bản thân</div>
          <h3 class="book-title">Atomic Habits</h3>
          <p class="book-author">Tác giả: James Clear</p>
        </div>

        <div class="book-card">
          <div class="book-img">
            <img src="{{ asset('images/matbiec-bia.jpg') }}" alt="Mắt biếc">
          </div>
          <div class="book-tag">Văn học</div>
          <div class="book-status">Có sẵn</div>
          <h3 class="book-title">Mắt biếc</h3>
          <p class="book-author">Tác giả: Nguyễn Nhật Ánh</p>
        </div>
      </div>
  </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
      <h2>Quản lý Mượn/ Trả sách</h2>
      <p>Theo dõi và quản lý các cuốn sách bạn đang mượn</p>
  
      <div class="cta-buttons">
        <a href="{{ url('/user/signup-user') }}" class="btn btn-primary">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="9" cy="7" r="4"/>
            <path d="M2 21v-1a7 7 0 0 1 14 0v1"/>
            <line x1="20" y1="8" x2="20" y2="14"/>
            <line x1="17" y1="11" x2="23" y2="11"/>
          </svg>
            Đăng ký miễn phí
        </a>
         
        <a href="#" class="btn btn-secondary">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
            Khám phá ngay
        </a>
      </div>
    </section>

@include('user.layouts.footer-homepage-login-user')
