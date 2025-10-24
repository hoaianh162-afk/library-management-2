<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thanh toán tiền phạt - Thư viện Tri thức</title>

  <link rel="stylesheet" href="{{ asset('css/styleguide.css') }}">
  <link rel="stylesheet" href="{{ asset('css/globals.css') }}">
  <link rel="stylesheet" href="{{ asset('css/header-homepage-user.css') }}">
  <link rel="stylesheet" href="{{ asset('css/tranglichsumuontra-v2.css') }}">
  <link rel="stylesheet" href="{{ asset('css/trangphat.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer_login-admin.css') }}">
</head>
<body>
  <div class="trang-pht">
    {{-- Header --}}
    @include('user.layouts.header-info-user')

    {{-- Vùng chứa nội dung động --}}
    <div id="main-content-4"></div>

    {{-- Footer --}}
    @include('user.layouts.footer-homepage-login-user')
  </div>

  {{-- JS tải nội dung --}}
  <script>
    function loadPage(page) {
      fetch(page)
        .then(response => response.text())
        .then(html => {
          document.getElementById("main-content-4").innerHTML = html;
        });
    }

    window.onload = () => loadPage("{{ url('user/content-trangphat') }}");

    document.addEventListener("click", function (e) {
      if (e.target.closest(".rectangle-thanh-toan")) {
        e.preventDefault();
        loadPage("{{ url('user/content-trangphat-thanhtoan') }}");
      }
    });

    // Popup user info
    function togglePopup() {
      const popup = document.getElementById("userPopup");
      popup.style.display = popup.style.display === "block" ? "none" : "block";
    }
    window.onclick = function (event) {
      if (!event.target.closest(".user-box") && !event.target.closest("#userPopup")) {
        document.getElementById("userPopup").style.display = "none";
      }
    };
  </script>
</body>
</html>
