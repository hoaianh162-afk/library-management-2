@extends('admin.layouts.mold-finemoney-management-admin')

@section('title', 'Quản lý phạt')

@section('content')
<section class="dashboard-content">
  <div class="dashboard-header">
    <h1 class="title">Quản lý phạt</h1>
    <h3 class="subtitle">Tiền phạt bằng số ngày trễ nhân lên 5.000 VNĐ/ ngày</h3>
  </div>

  <!-- Bảng danh sách tiền phạt -->
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
          @foreach($fines as $fine)
          <tr data-id="{{ $fine->idPhat }}">
            <td>{{ 'BR'.str_pad($fine->phieuMuonChiTiet->idPhieuMuonChiTiet ?? 0, 3, '0', STR_PAD_LEFT) }}</td>
            <td>{{ $fine->nguoiDung->hoTen}}</td>
            <td>{{ $fine->phieuMuonChiTiet->sach->tenSach}}</td>
            <td class="dayslate">{{ $fine->soNgayTre ?? '-' }}</td>
            <td class="finemoney">
              @if($fine->soNgayTre)
              {{ number_format($fine->soNgayTre * 5000, 0, ',', '.') }}
              @else
              -
              @endif
            </td>
            <td class="status {{ $fine->trangThaiThanhToan == 'paid' ? 'paiding' : 'notyetpaid' }}">
              {{ $fine->trangThaiThanhToan == 'paid' ? 'Đã trả' : 'Chưa trả' }}
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <!-- Pagination nếu cần -->
      <div class="pagination-wrapper">
        {{ $fines->links() }}
      </div>
    </div>
  </div>
</section>
@endsection