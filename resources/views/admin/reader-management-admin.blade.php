@extends('admin.layouts.mold-reader-management-admin')

@section('content')
<!-- Nội dung chính -->
<section class="dashboard-content">
    <div class="dashboard-header">
        <h1 class="title">Quản lý độc giả</h1>
        <button class="btn-export-reader" id="exportReaderBtn">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"> 
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
            </svg>
            Xuất danh sách
        </button>
    </div>

    <!-- Thẻ tổng số độc giả -->
    <div class="cards">
        <div class="card">
            <div class="icon-box green">
                <img src="{{ asset('images/iconstack.io - (User)-white-admin.png') }}" alt="Readers icon">
            </div>
            <div>
                <p class="label">Độc giả đăng ký</p>
                <h2>{{ $readers->count() }}</h2>
            </div>
        </div>
    </div>

    <!-- Tìm kiếm -->
    <div class="reader-filter-container">
        <div class="search-box">
            <img src="{{ asset('images/iconstack.io - (Search)-grey.png') }}">
            <input type="text" id="searchReader" placeholder="Tìm kiếm theo mã, tên, email, SDT...">
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
                    @foreach($readers as $reader)
                    <tr data-id="{{ $reader->idNguoiDung }}">
                        <td>{{ 'R'.str_pad($reader->idNguoiDung, 3, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $reader->hoTen }}</td>
                        <td>{{ $reader->email }}</td>
                        <td>{{ $reader->soDienThoai ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($reader->ngayDangKy)->format('d/m/Y') }}</td>
                        <td class="actions">
                            <svg class="reset-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="1 4 1 10 7 10"></polyline>
                                <path d="M3.51 15a9 9 0 101.73-9.46L1 10"></path>
                            </svg>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script src="{{ asset('js/reader-filter.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="{{ asset('js/reader-export.js') }}"></script>
<script src="{{ asset('js/reader-resetpw.js') }}"></script>
@endsection
