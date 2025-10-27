<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\NguoiDung;
use Illuminate\Http\Request;
use App\Models\Sach;
use App\Models\PhieuMuonChiTiet;

class DashBoardController extends Controller
{
    // Trang danh sách độc giả riêng (nếu cần)
    public function index()
    {
        $readers = NguoiDung::withCount('muonChiTiets')->get();

        return view('nguoi_dung.index', compact('readers'));
    }

    // Trang Dashboard admin
    public function dashboard()
    {
        $totalBooks = Sach::count();

        $totalReaders = NguoiDung::where('vaiTro', 'reader')->count();

        $booksBorrowed = PhieuMuonChiTiet::where('ghiChu', 'borrow')->count();

        $readers = NguoiDung::where('vaiTro', 'reader')->get();

        return view('admin.dashboard-admin', compact(
            'totalBooks',
            'totalReaders',
            'booksBorrowed',
            'readers'
        ));
    }

    public function stats()
    {
        return response()->json([
            'totalBooks' => Sach::count(),
            'totalReaders' => NguoiDung::where('vaiTro', 'reader')->count(),
            'booksBorrowed' => PhieuMuonChiTiet::where('ghiChu', 'borrow')->count()
        ]);
    }

}
