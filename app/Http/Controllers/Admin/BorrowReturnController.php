<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhieuMuonChiTiet;

class BorrowReturnController extends Controller
{
    public function index(Request $request)
    {
        $query = PhieuMuonChiTiet::with(['phieuMuon.nguoiDung', 'sach'])
            ->whereHas('phieuMuon.nguoiDung', function ($q) {
                $q->where('vaiTro', 'reader'); // Chỉ lấy reader
            });

        // Lọc tìm kiếm
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('phieuMuon.nguoiDung', function ($q2) use ($search) {
                    $q2->where('hoTen', 'like', "%$search%");
                })
                    ->orWhereHas('sach', function ($q3) use ($search) {
                        $q3->where('tenSach', 'like', "%$search%");
                    })
                    ->orWhere('idPhieuMuon', 'like', "%$search%")
                    ->orWhere('trangThaiCT', 'like', "%$search%");
            });
        }



        $borrowReturns = $query->orderBy('created_at', 'desc')->get();

        return view('admin.borrow-return-management-admin', compact('borrowReturns'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'trangThaiCT' => 'required|in:pending,approved,rejected'
        ]);

        $item = PhieuMuonChiTiet::find($id);

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Không tìm thấy yêu cầu'], 404);
        }

        $item->trangThaiCT = $request->trangThaiCT;
        $item->save();

        return response()->json(['success' => true, 'message' => 'Cập nhật thành công']);
    }
}
