<!-- resources/views/tranglichsumuontra.blade.php -->
<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lịch sử mượn trả - Người dùng</title>
    <link rel="stylesheet" href="{{ asset('css/globals.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleguide.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header-homepage-user.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tranglichsumuontra.css') }}">
  </head>

  <body>
    <div class="trang-lch-s-mn-tr">
      @include('user.layouts.header-tranglichsumuontra')

      <div class="body">
        <div class="group">
          <div class="group-2">
            <div class="text-wrapper">Lịch sử mượn trả</div>
            <p class="p">Xem lại toàn bộ lịch sử mượn trả và đặt chỗ của bạn</p>
          </div>
        </div>

        <div class="khoi-group3-4-14">
          <div class="max-group3-4-14">
            <div class="group-3">
              <div class="rectangle-2"></div>
              <div class="rectangle-3"></div>
              <div class="iconstack-io-book">
                <img src="{{ asset('images/iconstack.io - (Book 2) - white.png') }}" />
              </div>
              <div class="text-wrapper-2">5</div>
              <div class="text-wrapper-3">Tổng số lần mượn</div>
            </div>
            <div class="group-4">
              <div class="rectangle-4"></div>
              <div class="rectangle-5"></div>
              <div class="iconstack-io-book">
                <img src="{{ asset('images/iconstack.io - (Book 2) - white.png') }}" />
              </div>
              <div class="text-wrapper-2">4</div>
              <div class="text-wrapper-4">Đã trả</div>
            </div>
            <div class="group-14">
              <div class="rectangle-18"></div>
              <div class="rectangle-19"></div>
              <div class="text-wrapper-39">25.000đ</div>
              <div class="text-wrapper-40">Tổng phạt</div>
              <div class="dollar-sign">
                <img class="icon" src="{{ asset('images/Dollar sign.png') }}" />
              </div>
            </div>
          </div>
        </div>

        <div id="main-content"></div>
      </div>

      @include('user.layouts.footer-login-user')
    </div>

    {{-- ✅ SCRIPT: Giữ nguyên logic, chỉ chỉnh đường dẫn và tương thích Laravel --}}
    <script>
        function loadPage(page) {
            fetch(page)
                .then(response => response.text())
                .then(html => {
                    document.getElementById("main-content").innerHTML = html;
                })
                .catch(error => console.error('Lỗi khi tải trang:', error));
        }

        // ✅ Tải mặc định trang "Tất cả"
        window.onload = () => loadPage("{{ url('user/content-all-lsmn') }}");

        // ✅ Khi click vào các nút menu chính
        document.addEventListener("click", function(e) {
            if (e.target.closest(".group-6")) { // Lịch sử mượn trả
                e.preventDefault();
                loadPage("{{ url('user/content-all-lsmn') }}");
            }
            if (e.target.closest(".group-7")) { // Lịch sử đặt chỗ
                e.preventDefault();
                loadPage("{{ url('user/content-datcho') }}");
            }
        });

        // ✅ Khi click vào các nút chọn loại mượn trả
        document.addEventListener("click", function(e) {
            if (e.target.closest(".group-8")) { // Tất cả
                e.preventDefault();
                loadPage("{{ url('user/content-all-lsmn') }}");
            }
            if (e.target.closest(".group-9")) { // Đã trả
                e.preventDefault();
                loadPage("{{ url('user/content-datra-lsmn') }}");
            }
            if (e.target.closest(".group-10")) { // Đang mượn
                e.preventDefault();
                loadPage("{{ url('user/content-dangmuon-lsmn') }}");
            }
            if (e.target.closest(".group-11")) { // Trả trễ
                e.preventDefault();
                loadPage("{{ url('user/content-tratre-lsmn') }}");
            }
        });
    </script>

    {{-- ✅ SCRIPT: Popup người dùng --}}
    <script>
        function togglePopup() {
            const popup = document.getElementById("userPopup");
            popup.style.display = popup.style.display === "block" ? "none" : "block";
        }

        window.onclick = function(event) {
            if (!event.target.closest(".user-box") && !event.target.closest("#userPopup")) {
                document.getElementById("userPopup").style.display = "none";
            }
        }
    </script>

  </body>
</html>
