@include('layouts.mold-reader-management-admin')

{{-- Nội dung dashboard chính --}}
<!-- Nội dung chính -->
      <section class="dashboard-content">
        <div class="dashboard-header">
          <h1 class="title">Quản lý độc giả</h1>
          <button class="btn-export-reader" id="openAddBookModal">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
              <polyline points="7 10 12 15 17 10"/>
              <line x1="12" y1="15" x2="12" y2="3"/>
            </svg>
             Xuất danh sách
          </button>
        </div>

        <!-- Thẻ tổng số sách -->
        <div class="cards">
          <div class="card">
            <div class="icon-box green">
              <img src="images/iconstack.io - (User)-white-admin.png" alt="Readers icon">
            </div>
            <div>
              <p class="label">Độc giả đăng ký</p>
              <h2>7</h2>
            </div>
          </div>
        </div>

        <!-- Tìm kiếm -->
        <div class="reader-filter-container">
          <div class="search-box">
            <img src="images/iconstack.io - (Search)-grey.png">
            <input type="text" placeholder="Tìm kiếm theo mã độc giả, tên độc giả, email...">
          </div>
        </div>

        <!-- Bảng danh sách độc giả -->
        <div class="table-wrapper">
        <div class="table-scroll">
        <table class="reader-table">
          <thead>
            <tr>
              <th>Mã độc giả</th>
              <th>Tên độc giả</th>
              <th>Email</th>
              <th>Số điện thoại</th>
              <th>Ngày tham gia</th>
              <th>Đặt lại mật khẩu</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>R001</td>
              <td>Nguyễn Văn A</td>
              <td>nguyenvana@example.com</td>
              <td>0123456789</td>
              <td>15/01/2025</td>
              <td class="actions">
                 <svg class="reset-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="1 4 1 10 7 10"></polyline>
                  <path d="M3.51 15a9 9 0 101.73-9.46L1 10"></path>
                </svg>
 
              </td>
            </tr>
            <tr>
              <td>R002</td>
              <td>Trần Thị Bình</td>
              <td>tranthibinh@example.com</td>
              <td>0123456789</td>
              <td>15/01/2025</td>
              <td class="actions">
                 <svg class="reset-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="1 4 1 10 7 10"></polyline>
                  <path d="M3.51 15a9 9 0 101.73-9.46L1 10"></path>
                </svg>

              </td>
            </tr>
            <tr>
              <td>R003</td>
              <td>Lê Văn Cường</td>
              <td>jamesclear@example.com</td>
              <td>0123456789</td>
              <td>15/01/2025</td>
              <td class="actions">
                 <svg class="reset-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="1 4 1 10 7 10"></polyline>
                  <path d="M3.51 15a9 9 0 101.73-9.46L1 10"></path>
                </svg>

              </td>
            </tr>
            
            <tr>
                <td>R004</td>
                <td>Phạm Thị Dung</td>
                <td>phamthidung@example.com</td>
                <td>0123456789</td>
                <td>15/01/2025</td>
                <td class="actions">
                     <svg class="reset-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="1 4 1 10 7 10"></polyline>
                        <path d="M3.51 15a9 9 0 101.73-9.46L1 10"></path>
                    </svg>

              </td>
            </tr>

            <tr>
                <td>R005</td>
                <td>Hoàng Văn Em</td>
                <td>hoangvanem@example.com</td>
                <td>0123456789</td>
                <td>15/01/2025</td>
                <td class="actions">
                    <svg class="reset-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="1 4 1 10 7 10"></polyline>
                      <path d="M3.51 15a9 9 0 101.73-9.46L1 10"></path>
                    </svg>

                </td>
            </tr>

            <tr>
                <td>R006</td>
                <td>Trương Thị Gấm</td>
                <td>truongthigam@example.com</td>
                <td>0123456789</td>
                <td>15/01/2025</td>
                <td class="actions">
                    <svg class="reset-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="1 4 1 10 7 10"></polyline>
                      <path d="M3.51 15a9 9 0 101.73-9.46L1 10"></path> 
                    </svg>
            </tr>

            <tr>
                <td>R007</td>
                <td>Đặng Văn Hùng</td>
                <td>dangvanhung@example.com</td>
                <td>0123456789</td>
                <td>15/01/2025</td>
                <td class="actions">
                    <svg class="reset-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="1 4 1 10 7 10"></polyline>
                      <path d="M3.51 15a9 9 0 101.73-9.46L1 10"></path>
                    </svg>
                </td>
            </tr>

          </tbody>
        </table>
        </div>
      </div>

      </section>


{{-- Scripts --}}
<script src="{{ asset('js/reader-filter.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="{{ asset('js/reader-export.js') }}"></script>
<script src="{{ asset('js/reader-resetpw.js') }}"></script>
</body>
</html>
