@include('layouts.mold-finemoney-management-admin')

<section class="dashboard-content">
  <div class="dashboard-header">
    <h1 class="title">Quản lý phạt</h1>
    <h3 class="subtitle">Tiền phạt bằng số ngày trễ nhân lên 5.000 VNĐ/ ngày </h3>
  </div>

  <!-- Bảng danh sách nợ phạt -->
  <div class="table-wrapper">
    <div class="table-scroll">
      <table class="finemoney-table">
        <thead>
          <tr>
            <th>Mã phiếu mượn</th>
            <th>Tên độc giả</th>
            <th>Tên sách</th>
            <th>Số ngày trễ</th>
            <th>Số tiền phạt</th>
            <th>Trạng thái</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>BR001</td>
            <td>Nguyễn Văn A</td>
            <td>Nhà Giả Kim</td>
            <td><span class="sta dayslate">3</span></td>              
            <td><span class="sta finemoney">15.000</span></td>
            <td><span class="status paiding">Đã trả</span></td>
          </tr>
          <tr>
            <td>BR002</td>
            <td>Trần Thị Bình</td>
            <td>Atomic Habits</td>
            <td><span class="sta dayslate">5</span></td>
            <td><span class="sta finemoney">25.000</span></td>
            <td><span class="status notyetpaid">Chưa trả</span></td>
          </tr>
          <tr>
            <td>FT001</td>
            <td>Võ Văn C</td>
            <td>Mắt Biếc</td>
            <td><span class="sta dayslate">-</span></td>
            <td><span class="sta finemoney">-</span></td>
            <td><span class="status paiding">-</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

{{-- Scripts riêng --}}
<script src="{{ asset('js/finemoney-toggle.js') }}"></script>

</main>
</body>
</html>
        