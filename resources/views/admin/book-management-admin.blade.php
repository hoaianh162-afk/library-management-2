@extends('admin.layouts.mold-book-management-admin')

@section('content')
  <div class="dashboard-header">
    <h1 class="title">Quản lý sách</h1>
    <button class="btn-add-book" id="openAddBookModal">+ Thêm sách mới</button>
  </div>


<!-- Popup Thêm Sách Mới -->
<div class="modal-overlay" id="modalOverlay"></div>
<div class="modal" id="addBookModal">
  <div class="modal-header">
    <h2>Thêm sách mới</h2>
    <span class="modal-close" id="closeAddBookModal">&times;</span>
  </div>
  <div class="modal-body">
    <form id="addBookForm">
      @csrf
      <label>Mã sách</label>
      <input type="text" id="addMa" name="maSach" placeholder="Nhập mã sách" required>

      <label>Tên sách</label>
      <input type="text" id="addTen" name="tenSach" placeholder="Nhập tên sách" required>

      <label>Tên tác giả</label>
      <input type="text" id="addTacGia" name="tacGia" placeholder="Nhập tên tác giả" required>

      <label>Thể loại</label>
      <select id="addTheLoai" name="idDanhMuc" required>
        <option value="">Chọn thể loại</option>
        @foreach($categories as $category)
          <option value="{{ $category->idDanhMuc }}">{{ $category->tenDanhMuc }}</option>
        @endforeach
      </select>

      <label>Số lượng</label>
      <input type="number" id="addSoLuong" name="soLuong" placeholder="Nhập số lượng" min="0" required>
    </form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn-cancel" id="cancelAddBook">Hủy</button>
    <button type="submit" class="btn-submit" form="addBookForm">Thêm sách</button>
  </div>
</div>

<!-- Tìm kiếm và lọc sách -->
<div class="book-filter-container">
  <div class="search-box">
    <img src="{{ asset('images/iconstack.io - (Search)-grey.png') }}">
    <input type="text" id="searchBook" placeholder="Tìm kiếm theo tên sách, tác giả hoặc mã sách...">
  </div>
  <div class="filter-dropdown">
    <select id="filterCategory">
      <option value="">Tất cả thể loại</option>
      @foreach($categories as $category)
        <option value="{{ $category->idDanhMuc }}">{{ $category->tenDanhMuc }}</option>
      @endforeach
    </select>
  </div>
</div>

<!-- Bảng danh sách sách -->
<div class="table-wrapper">
  <div class="table-scroll">
    <table class="book-table">
      <thead>
        <tr>
          <th>Mã sách</th>
          <th>Tên sách</th>
          <th>Tác giả</th>
          <th>Thể loại</th>
          <th>Số lượng</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach($books as $book)
          <tr data-id="{{ $book->idSach }}">
            <td>{{ $book->maSach }}</td>
            <td>{{ $book->tenSach }}</td>
            <td>{{ $book->tacGia }}</td>
            <td data-id="{{ $book->danhMuc->idDanhMuc ?? '' }}">{{ $book->danhMuc->tenDanhMuc ?? '' }}</td>
            <td>{{ $book->soLuong }}</td>
            <td class="actions">
              <svg xmlns="http://www.w3.org/2000/svg" class="edit-icon" data-id="{{ $book->idSach }}" viewBox="0 0 24 24" fill="currentColor">
                <path d="M4.5 2.25A2.25 2.25 0 002.25 4.5v15A2.25 2.25 0 004.5 21.75h15a2.25 2.25 0 002.25-2.25V12.75a.75.75 0 00-1.5 0V19.5a.75.75 0 01-.75.75h-15a.75.75 0 01-.75-.75v-15a.75.75 0 01.75-.75h7.5a.75.75 0 000-1.5h-7.5z"/>
                <path d="M16.862 3.487a1.5 1.5 0 012.121 2.126l-.793.792-2.12-2.12.792-.793zM14.729 5.616l-6.45 6.45a.75.75 0 00-.19.33l-.75 3a.75.75 0 00.928.928l3-.75a.75.75 0 00.33-.19l6.45-6.45-2.318-2.318z"/>
              </svg>

              <svg xmlns="http://www.w3.org/2000/svg" class="delete-icon" data-id="{{ $book->idSach }}" viewBox="0 0 24 24" fill="currentColor">
                <path fill-rule="evenodd" d="M9 3.75A1.5 1.5 0 0110.5 2.25h3A1.5 1.5 0 0115 3.75V4.5h4.5a.75.75 0 010 1.5H4.5a.75.75 0 010-1.5H9V3.75zm-3 4.5A.75.75 0 016.75 7.5h10.5a.75.75 0 01.75.75v10.5A2.25 2.25 0 0115.75 21h-7.5A2.25 2.25 0 016 18.75V8.25A.75.75 0 016.75 7.5zM10.5 10.5a.75.75 0 000 1.5v4.5a.75.75 0 001.5 0v-4.5a.75.75 0 00-1.5-1.5zm3 0a.75.75 0 000 1.5v4.5a.75.75 0 001.5 0v-4.5a.75.75 0 00-1.5-1.5z" clip-rule="evenodd"/>
              </svg>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Popup chỉnh sửa sách -->
<div id="editOverlay" class="modal-overlay"></div>
<div id="editModal" class="modal">
  <div class="modal-header">
    <h2>Chỉnh sửa thông tin sách</h2>
    <span id="closeEditModal" class="modal-close">&times;</span>
  </div>
  <div class="modal-body">
    <form id="editForm">
      @csrf
      @method('PUT')
      <input type="hidden" id="editId" name="idSach">
      
      <label>Mã sách</label>
      <input type="text" id="editMa" name="maSach" readonly>
    
      <label>Tên sách</label>
      <input type="text" id="editTen" name="tenSach" required>
    
      <label>Tên tác giả</label>
      <input type="text" id="editTacGia" name="tacGia" required>
    
      <label>Thể loại</label>
      <select id="editTheLoai" name="idDanhMuc" required>
        <option value="">Chọn thể loại</option>
        @foreach($categories as $category)
          <option value="{{ $category->idDanhMuc }}">{{ $category->tenDanhMuc }}</option>
        @endforeach
      </select>
    
      <label>Số lượng</label>
      <input type="number" id="editSoLuong" name="soLuong" min="0" required>
    
      <div class="modal-footer">
        <button type="button" id="cancelEditBtn" class="btn-cancel">Hủy</button>
        <button type="submit" class="btn-submit">Cập nhật</button>
      </div>
    </form>
  </div>
</div>

<!-- Popup xác nhận xóa -->
<div id="deleteModal" class="modal-delete">
  <h2>Xóa sách</h2>
  <p id="deleteMessage">Bạn có chắc muốn xóa sách này?</p>
  <div class="modal-footer">
    <button class="btn-cancel" id="deleteCancelBtn">Hủy</button>
    <button class="btn-delete" id="confirmDeleteBtn">Xóa</button>
  </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('js/book-add.js') }}"></script>
<script src="{{ asset('js/book-edit.js') }}"></script>
<script src="{{ asset('js/book-delete.js') }}"></script>
<script src="{{ asset('js/book-filter.js') }}"></script>
@endsection
