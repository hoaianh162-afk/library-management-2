<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mượn trả sách - Người dùng</title>

  <link rel="stylesheet" href="{{ asset('css/styleguide.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/globals.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/header-homepage-user.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/tranglichsumuontra.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/datchosach.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/trangmuontra(sachdangmuon).css') }}" />
</head>
<body>
  <div class="trang-lch-s-mn-tr">
    @include('user.layouts.header-trangmuontra(sachdangmuon)')

    <div class="body">
      <div class="group">
        <div class="group-2">
          <div class="text-wrapper">Quản lý Mượn/ Trả sách</div>
          <p class="p">Theo dõi và quản lý các cuốn sách bạn đang mượn</p>
        </div>
      </div>

      <div id="main-content-3"></div>
    </div>

    @include('user.layouts.footer-login-user')
  </div>

  <script>
    function loadPage(page) {
      fetch(page)
        .then(response => response.text())
        .then(html => {
          document.getElementById("main-content-3").innerHTML = html;
        });
    }
    window.onload = () => loadPage("{{ url('user/content-mtra-sachdangmuon') }}");

    document.addEventListener('click', function(e) {
      if (e.target.closest('.group-6')) {
        e.preventDefault();
        loadPage("{{ url('user/content-mtra-sachdangmuon') }}");
      }
      if (e.target.closest('.group-7')) {
        e.preventDefault();
        loadPage("{{ url('user/content-mtra-muonsachmoi') }}");
      }
    });

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
