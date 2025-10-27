<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\DanhMuc;


class BookController extends Controller
{
    // Hiển thị danh sách sách
    public function index()
    {
        $books = Sach::with('danhMuc')->get();
        $categories = DanhMuc::all();
        return view('admin.book-management-admin', compact('books', 'categories'));
    }

    // Thêm sách mới
    public function store(Request $request)
    {
        $request->validate([
            'maSach' => 'required|string|max:50',
            'tenSach' => 'required|string|max:200',
            'tacGia' => 'nullable|string|max:200',
            'namXuatBan' => 'nullable|digits:4|integer',
            'soLuong' => 'required|integer|min:1',
            'idDanhMuc' => 'required|exists:danh_muc,idDanhMuc',
            'moTa' => 'nullable|string',
            'vitri' => 'nullable|string|max:100',
        ]);

        $exists = Sach::where('maSach', $request->maSach)
            ->orWhere('tenSach', $request->tenSach)
            ->first();

        if ($exists) {
            return response()->json([
                'success' => false,
                'message' => '❌ Mã sách hoặc tên sách đã tồn tại'
            ]);
        }

        $book = new Sach();
        $book->maSach = $request->maSach;
        $book->tenSach = $request->tenSach;
        $book->tacGia = $request->tacGia;
        $book->namXuatBan = $request->namXuatBan;
        $book->soLuong = $request->soLuong;
        $book->idDanhMuc = $request->idDanhMuc;
        $book->moTa = $request->moTa;
        $book->vitri = $request->vitri ?? null;
        $book->trangThai = 'Còn sách';

        // Lưu vào database
        $book->save();

        return response()->json([
            'success' => true,
            'message' => '✅ Thêm sách thành công',
            'book' => $book
        ]);
    }


    // Cập nhật sách
    public function update(Request $request, $id)
    {
        $book = Sach::findOrFail($id);

        $request->validate([
            'tenSach' => 'required|string|max:200',
            'tacGia' => 'nullable|string|max:200',
            'namXuatBan' => 'nullable|digits:4|integer',
            'soLuong' => 'required|integer|min:1',
            'idDanhMuc' => 'required|exists:danh_muc,idDanhMuc',
            'moTa' => 'nullable|string',
            'vitri' => 'nullable|string|max:100',
            //'trangThai' => 'required|string|max:20',
        ]);

        $book->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật sách thành công'
        ]);
    }

    // Xóa sách
    public function destroy($id)
    {
        $book = Sach::findOrFail($id);

        // Kiểm tra xem sách có phiếu mượn không
        if ($book->muonChiTiets()->count() > 0) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể xóa sách này vì vẫn còn người mượn.'
            ]);
        }

        // Nếu không có, xóa sách
        $book->delete();

        return response()->json([
            'success' => true,
            'message' => 'Đã xóa sách thành công.'
        ]);
    }
}
