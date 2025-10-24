<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tra cứu sách - Người dùng</title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/styleguide.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/globals.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/search-book-user.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/header-homepage-user.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/footer_login-admin.css') }}" />
</head>
<body>
  <div class="page-container">

    <!-- include header -->
    @include('user.layouts.header-search-book-user')

    <!-- ======================== MAIN CONTENT ======================== -->
    <section class="cta-section">
      <h2>Tra cứu sách</h2>
      <p>Tìm kiếm trong kho tàng tri thức với hàng nghìn đầu sách</p>
      <div class="search-box">
        <input type="text" placeholder="Tìm kiếm theo tên sách, tác giả...">
        <select>
          <option value="">Tất cả</option>
          <option value="sachgiaokhoa">Sách giáo khoa</option>
          <option value="khoahoc">Khoa học</option>
          <option value="vanhoc">Văn học</option>
        </select>
        <button class="search-btn">
          <svg class="search-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
               viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          Tìm kiếm
        </button>
      </div>
    </section>

    <section class="favorite-books">
      <div class="section-header">
        <div>
          <h2>Sách được yêu thích</h2>
          <p>Những cuốn sách được mượn nhiều nhất trong tháng</p>
        </div>
      </div>

    <section class="book-list">

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/nhagiakim-bia.jpg') }}" alt="Nhà giả kim">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Văn học</span>
    <span class="book-status">Có sẵn</span>
  </div>

  <h3 class="book-title">Nhà giả kim</h3>
  <p class="book-author">Tác giả: Paulo Coelho</p>
  <p class="book-year">Năm xuất bản: 1988</p>
  <p class="book-info">Câu chuyện về hành trình đi tìm kho báu của một chàng trai trẻ.</p>

  <div class="book-action">
    <button class="borrow-btn" onclick="borrowBook('Nhà giả kim')">
      <svg xmlns="http://www.w3.org/2000/svg" class="borrow-icon" width="21" height="21"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
        <path d="M4 4h16v16H4z"/>
      </svg>
      Mượn ngay
    </button>
  </div>
</div>

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/toithayhoavangtrencoxanh-bia.jpg') }}" alt="Tôi thấy hoa vàng trên cỏ xanh">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Văn học</span>
    <span class="book-status">Có sẵn</span>
  </div>

  <h3 class="book-title">Tôi thấy hoa vàng trên cỏ xanh</h3>
  <p class="book-author">Tác giả: Nguyễn Nhật Ánh</p>
  <p class="book-year">Năm xuất bản: 2015</p>
  <p class="book-info">Câu chuyện tuổi thơ đầy màu sắc và kỷ niệm của hai anh em ở miền quê Việt Nam.</p>

  <div class="book-action">
    <button class="borrow-btn" onclick="borrowBook('Tôi thấy hoa vàng trên cỏ xanh')">
      <svg xmlns="http://www.w3.org/2000/svg" class="borrow-icon" width="21" height="21"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
        <path d="M4 4h16v16H4z"/>
      </svg>
      Mượn ngay
    </button>
  </div>
</div>

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/atomichabits-bia.webp') }}" alt="Atomic Habits">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Phát triển bản thân</span>
    <span class="book-status">Có sẵn</span>
  </div>

  <h3 class="book-title">Atomic Habits</h3>
  <p class="book-author">Tác giả: James Clear</p>
  <p class="book-year">Năm xuất bản: 2018</p>
  <p class="book-info">Cuốn sách cung cấp các chiến lược để xây dựng thói quen tốt và loại bỏ thói quen xấu.</p>

  <div class="book-action">
    <button class="borrow-btn disabled-btn">Mượn ngay</button>
    <button class="reserve-btn" onclick="reserveBook('Atomic Habits')">
      <svg xmlns="http://www.w3.org/2000/svg" class="reserve-icon" width="19" height="19"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
      </svg>
    </button>
  </div>
</div>

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/matbiec-bia.jpg') }}" alt="Mắt biếc">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Văn học</span>
    <span class="book-status">Có sẵn</span>
  </div>

  <h3 class="book-title">Mắt biếc</h3>
  <p class="book-author">Tác giả: Nguyễn Nhật Ánh</p>
  <p class="book-year">Năm xuất bản: 1990</p>
  <p class="book-info">Câu chuyện tình yêu đầy trắc trở và cảm động giữa Ngạn và Hà Lan.</p>

  <div class="book-action">
    <button class="borrow-btn" onclick="borrowBook('Mắt biếc')">
      <svg xmlns="http://www.w3.org/2000/svg" class="borrow-icon" width="21" height="21"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
        <path d="M4 4h16v16H4z"/>
      </svg>
      Mượn ngay
    </button>
  </div>
</div>

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/muoivancauhoivisao-bia.jpg') }}" alt="Mười vạn câu hỏi vì sao?">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Văn học</span>
    <span class="book-status">Có sẵn</span>
  </div>
  
  <h3 class="book-title">Mười vạn câu hỏi vì sao?</h3>
  <p class="book-author">Tác giả: Nhiều tác giả</p>
  <p class="book-year">Năm xuất bản: Không rõ</p>
  <p class="book-info">Cuốn sách tập hợp nhiều câu hỏi thú vị và bổ ích cho trẻ em.</p>

  <div class="book-action">
    <button class="borrow-btn" onclick="borrowBook('Mười vạn câu hỏi vì sao?')">
      <svg xmlns="http://www.w3.org/2000/svg" class="borrow-icon" width="21" height="21"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
        <path d="M4 4h16v16H4z"/>
      </svg>
      Mượn ngay
    </button>
  </div>
</div>

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/hoangtube-bia.jpg') }}" alt="Hoàng tử bé">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Văn học</span>
    <span class="book-status">Có sẵn</span>
  </div>
  
  <h3 class="book-title">Hoàng tử bé</h3>
  <p class="book-author">Tác giả: Nguyễn Thành Long (dịch)</p>
  <p class="book-year">Năm xuất bản: 1943</p>
  <p class="book-info">Câu chuyện phiêu lưu kỳ thú của cậu bé hoàng tử và những người bạn trên hành tinh khác.</p>

  <div class="book-action">
    <button class="borrow-btn" onclick="borrowBook('Hoàng tử bé')">
      <svg xmlns="http://www.w3.org/2000/svg" class="borrow-icon" width="21" height="21"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
        <path d="M4 4h16v16H4z"/>
      </svg>
      Mượn ngay
    </button>
  </div>
</div>

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/toidihoc-bia.jpg') }}" alt="Tôi đi học">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Văn học</span>
  </div>
  
  <h3 class="book-title">Tôi đi học</h3>
  <p class="book-author">Tác giả: Nguyễn Ngọc Ký</p>
  <p class="book-year">Năm xuất bản: 1940</p>
  <p class="book-info">Câu chuyện về hành trình đến trường của một cậu bé khuyết tật.</p>

  <div class="book-action">
    <button class="borrow-btn disabled-btn">
      Mượn ngay
    </button>
    <button class="reserve-btn" onclick="reserveBook('Tôi đi học')">
      <svg xmlns="http://www.w3.org/2000/svg" class="reserve-icon" width="19" height="19"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/>
      </svg>
    </button>
  </div>
</div>

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/hanhphuchaykhongdotaquyetdinh-bia.jpg') }}" alt="Hạnh phúc hay không do ta quyết định">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Văn học</span>
    <span class="book-status">Có sẵn</span>
  </div>
  
  <h3 class="book-title">Hạnh phúc hay không do ta quyết định</h3>
  <p class="book-author">Tác giả: Watanabe Kazuko, Nguyễn Quốc Vương (dịch)</p>
  <p class="book-year">Năm xuất bản: Không rõ</p>
  <p class="book-info">Câu chuyện về quan điểm hạnh phúc của tác giả.</p>

  <div class="book-action">
    <button class="borrow-btn" onclick="borrowBook('Hạnh phúc hay không do ta quyết định')">
      <svg xmlns="http://www.w3.org/2000/svg" class="borrow-icon" width="21" height="21"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
        <path d="M4 4h16v16H4z"/>
      </svg>
      Mượn ngay
    </button>
  </div>
</div>


<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/taybalotrendata-bia.jpg') }}" alt="Tây ba lô trên đất châu Á">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Văn học</span>
    <span class="book-status">Có sẵn</span>
  </div>
  
  <h3 class="book-title">Tây ba lô trên đất châu Á</h3>
  <p class="book-author">Tác giả: Rosie Nguyễn</p>
  <p class="book-year">Năm xuất bản: 1988</p>
  <p class="book-info">Câu chuyện về hành trình khám phá văn hóa và con người châu Á của tác giả.</p>

  <div class="book-action">
    <button class="borrow-btn" onclick="borrowBook('Tây ba lô trên đất châu Á')">
      <svg xmlns="http://www.w3.org/2000/svg" class="borrow-icon" width="21" height="21"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
        <path d="M4 4h16v16H4z"/>
      </svg>
      Mượn ngay
    </button>
  </div>
</div>

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/phuthuyxuoz-bia.jpg') }}" alt="Phù thủy xứ Oz">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Phiêu lưu</span>
    <span class="book-status">Có sẵn</span>
  </div>
  
  <h3 class="book-title">Phù thủy xứ Oz</h3>
  <p class="book-author">Tác giả: Rosie Dickins, Võ Hứa Vạn Mỹ (dịch)</p>
  <p class="book-year">Năm xuất bản: 1990</p>
  <p class="book-info">Câu chuyện về cuộc phiêu lưu của Dorothy và những người bạn trên hành trình đến xứ Oz.</p>

  <div class="book-action">
    <button class="borrow-btn" onclick="borrowBook('Phù thủy xứ Oz')">
      <svg xmlns="http://www.w3.org/2000/svg" class="borrow-icon" width="21" height="21"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
        <path d="M4 4h16v16H4z"/>
      </svg>
      Mượn ngay
    </button>
  </div>
</div>

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/howtowin-bia.jpg') }}" alt="How to win friends and influence people">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Phát triển bản thân</span>
  </div>
  
  <h3 class="book-title">How to win friends and influence people</h3>
  <p class="book-author">Tác giả: Dale Carnegie</p>
  <p class="book-year">Năm xuất bản: 1936</p>
  <p class="book-info">Cuốn sách kinh điển về nghệ thuật giao tiếp.</p>

  <div class="book-action">
    <button class="borrow-btn disabled-btn">
      Mượn ngay
    </button>

    <button class="reserve-btn" onclick="reserveBook('How to win friends and influence people')">
      <svg xmlns="http://www.w3.org/2000/svg" class="reserve-icon" width="19" height="19"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path>
      </svg>
    </button>
  </div>
</div>

<div class="book-card">
  <div class="book-img">
    <img src="{{ asset('images/chuatenhungchiecnhan-bia.jpg') }}" alt="Chúa tể những chiếc nhẫn">
  </div>
  <div class="tag-status-container">
    <span class="book-tag purple">Fantasy</span>
    <span class="book-status">Có sẵn</span>
  </div>
  
  <h3 class="book-title">Chúa tể những chiếc nhẫn</h3>
  <p class="book-author">Tác giả: J.R.R. Tolkien</p>
  <p class="book-year">Năm xuất bản: 1954</p>
  <p class="book-info">Câu chuyện về cuộc phiêu lưu của Frodo và những người bạn trong hành trình tiêu diệt chiếc nhẫn.</p>

  <div class="book-action">
    <button class="borrow-btn" onclick="borrowBook('Chúa tể những chiếc nhẫn')">
      <svg xmlns="http://www.w3.org/2000/svg" class="borrow-icon" width="21" height="21"
           viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2"
           stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
        <path d="M4 4h16v16H4z"/>
      </svg>
      Mượn ngay
    </button>
  </div>
</div>

      </section>
    </section>


    <!-- include footer -->
    @include('user.layouts.footer-homepage-login-user')

  </div>

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

    function borrowBook(bookName) {
      alert("✅ Bạn đã mượn sách \"" + bookName + "\" thành công!\nVui lòng đến quầy để nhận sách.");
    }

    function reserveBook(bookName) {
      alert("📚 Bạn đã đặt chỗ sách \"" + bookName + "\" thành công!");
    }
  </script>

</body>
</html>
