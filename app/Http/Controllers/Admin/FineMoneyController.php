<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phat;

class FineMoneyController extends Controller
{
    /**
     * Trang quản lý tiền phạt
     */
    public function index(Request $request)
    {
        $fines = Phat::with(['nguoiDung', 'phieuMuonChiTiet.sach'])
            ->where('soNgayTre', '>', 0)
            ->whereHas('nguoiDung', function($q) {
                $q->where('vaiTro', '<>', 'admin');
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $fines->transform(function($fine) {
            $fine->readerName = $fine->nguoiDung->hoTen ?? '-';
            $fine->bookName = $fine->phieuMuonChiTiet->sach->tenSach ?? '-';
            $fine->borrowId = $fine->phieuMuonChiTiet->idPhieuMuonChiTiet ?? 0;
            return $fine;
        });

        return view('admin.finemoney-management-admin', compact('fines'));
    }

    /**
     * Toggle trạng thái trả tiền
     */
    public function toggleStatus(Request $request, $id)
    {
        $fine = Phat::with('nguoiDung')->find($id);

        if (!$fine) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy phiếu phạt'
            ]);
        }

        // Chỉ toggle nếu soNgayTre > 0 và người dùng không phải admin
        if ($fine->soNgayTre <= 0 || ($fine->nguoiDung && $fine->nguoiDung->vaiTro === 'admin')) {
            return response()->json([
                'success' => false,
                'message' => 'Không thể thay đổi trạng thái cho phiếu này'
            ]);
        }

        // Chuyển trạng thái pending <=> paid
        $fine->trangThaiThanhToan = ($fine->trangThaiThanhToan === 'paid') ? 'pending' : 'paid';
        $fine->save();

        return response()->json([
            'success' => true,
            'newStatusText' => $fine->trangThaiThanhToan === 'paid' ? 'Đã trả' : 'Chưa trả',
            'newStatusClass' => $fine->trangThaiThanhToan === 'paid' ? 'paiding' : 'notyetpaid'
        ]);
    }
}
