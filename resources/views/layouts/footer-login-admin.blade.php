    <!-- Footer -->
    <footer class="footer">
      <div class="footer-left">
        <div class="footer-logo">
          <div class="footer-icon">
            <img src="{{ asset('images/iconstack.io - (Book).png') }}" alt="Thư viện Tri Thức logo" />
          </div>
          <div class="footer-text">Thư viện<br />Tri Thức</div>
        </div>
        <p>
          Hệ thống quản lý thư viện hiện đại, giúp bạn dễ dàng tra cứu,
          <br />mượn và quản lý sách một cách hiệu quả
        </p>
      </div>

      <div class="footer-right">
        <h2>Liên hệ</h2>
        <p>
          <img src="{{ asset('images/iconstack.io - (Location 06).png') }}" alt="Địa chỉ logo" />
          280 An Dương Vương, Phường 7, Quận 5, Hồ Chí Minh</p>
        <p class="underline">
          <img src="{{ asset('images/Vector.png') }}" alt="Số điện thoại logo" />
          028 3835 2020</p>
        <p>
          <img src="{{ asset('images/iconstack.io - (Mail).png') }}" alt="Email logo" />
          webmaster@hcmue.edu.vn
        </p>
      </div>
    </footer>

  </div> <!-- End page-container -->

  <script>
    document.querySelectorAll('a[href="#"]').forEach(function(link) {
      link.addEventListener('click', function(event) {
        event.preventDefault(); 
        alert("⚠️ Bạn cần đăng nhập hoặc đăng ký để sử dụng chức năng này!");
      });
    });
  </script>
</body>
</html>
