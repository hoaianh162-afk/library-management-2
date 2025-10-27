@include('admin.layouts.mold-borrow-return-management-admin')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="dashboard-content">
  <div class="dashboard-header">
    <h1 class="title">Quản lý mượn trả</h1>
  </div>

  <!-- Tìm kiếm -->
  <div class="borrow-return-filter-container">
    <form method="GET" action="{{ route('admin.borrow-returns') }}" class="search-box">
      <img src="{{ asset('images/iconstack.io - (Search)-grey.png') }}">
      <input type="text" name="search" placeholder="Tìm kiếm theo mã yêu cầu, tên độc giả, tên sách, loại yêu cầu..." value="{{ request('search') }}">
      
    </form>
  </div>

  <!-- Bảng danh sách yêu cầu mượn trả -->
  <div class="table-wrapper">
    <div class="table-scroll">
      <table class="borrow-return-table">
        <thead>
          <tr>
            <th>Mã yêu cầu</th>
            <th>Tên độc giả</th>
            <th>Tên sách</th>
            <th>Loại yêu cầu</th>
            <th>Ngày yêu cầu</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          @foreach($borrowReturns as $item)
          <tr>
            <td>{{ 'BR'.str_pad($item->idPhieuMuonChiTiet, 3, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $item->nguoiMuon }}</td>
            <td>{{ $item->tenSach }}</td>
            <td>
              @if($item->ghiChu == 'borrow')
                <span class="sta borrow">Mượn sách</span>
              @else
                <span class="sta return">Trả sách</span>
              @endif
            </td>
            <td>{{ $item->phieuMuon->created_at->format('d/m/Y') }}</td>
            <td>
              @if($item->trangThaiCT == 'pending')
                <span class="status pending">Chờ duyệt</span>
              @elseif($item->trangThaiCT == 'approved')
                <span class="status approved">Đã duyệt</span>
              @else
                <span class="status rejected">Từ chối</span>
              @endif
            </td>
            <td class="actions">
              <!-- Chấp nhận -->
              <svg class="icon-tick" data-id="{{ $item->idPhieuMuonChiTiet }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="20 6 9 17 4 12"></polyline>
              </svg>
              <!-- Từ chối -->
              <svg class="icon-x" data-id="{{ $item->idPhieuMuonChiTiet }}" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
              </svg>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</section>

<script src="{{ asset('js/borrow-return-filter.js') }}"></script>
<script src="{{ asset('js/borrow-return-request.js') }}"></script>

</main>
</body>
</html>
