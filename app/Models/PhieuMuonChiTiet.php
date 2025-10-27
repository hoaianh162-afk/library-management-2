<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhieuMuonChiTiet extends Model
{
    protected $table = 'phieu_muon_chi_tiet';
    protected $primaryKey = 'idPhieuMuonChiTiet';

    public function phieuMuon()
    {
        return $this->belongsTo(PhieuMuon::class, 'idPhieuMuon', 'idPhieuMuon');
    }

    public function sach()
    {
        return $this->belongsTo(Sach::class, 'idSach', 'idSach');
    }


    // Thuộc tính ảo: lấy trạng thái của sách
    public function getTrangThaiAttribute()
    {
        return $this->trangThaiCT; // hoặc tên cột trạng thái thực tế
    }

    // Thuộc tính ảo: tên sách
    public function getTenSachAttribute()
    {
        return $this->sach ? $this->sach->tenSach : null;
    }

    // Thuộc tính ảo: tên người mượn
    public function getNguoiMuonAttribute()
    {
        return $this->phieuMuon ? $this->phieuMuon->nguoiDung->hoTen : null;
    }

    public function getLoaiYeuCauAttribute()
    {
        return strpos($this->trangThaiCT, 'returned') !== false ? 'returned' : 'borrowed';
    }

    public function scopeOnlyReaders($query)
    {
        return $query->whereHas('phieuMuon.nguoiDung', function ($q) {
            $q->where('vaiTro', 'reader');
        });
    }
}
