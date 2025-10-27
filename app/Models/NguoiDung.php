<?php

namespace App\Models;

use App\Models\PhieuMuonChiTiet;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class NguoiDung extends Authenticatable
{
    use Notifiable;

    protected $table = 'nguoi_dung';
    protected $primaryKey = 'idNguoiDung';
    protected $fillable = [
        'hoTen',
        'email',
        'matKhau',
        'soDienThoai',
        'diaChi',
        'vaiTro',
        'ngayDangKy',
        'trangThai'
    ];
    protected $hidden = ['matKhau'];
    public $timestamps = true;

    public function phieuMuons()
    {
        return $this->hasMany(PhieuMuon::class, 'idNguoiDung', 'idNguoiDung');
    }

    public function muonChiTiets()
    {
        return $this->hasManyThrough(
            PhieuMuonChiTiet::class,
            PhieuMuon::class,
            'idNguoiDung',
            'idPhieuMuon',
            'idNguoiDung',
            'idPhieuMuon'
        );
    }

    // Tổng số sách đã mượn
    public function getSoSachDaMuonAttribute()
    {
        return $this->muonChiTiets()->count();
    }

    // Số sách đang mượn (trạng thái = borrowed)
    public function getSoSachDangMuonAttribute()
    {
        return $this->muonChiTiets()->where('phieu_muon_chi_tiet.ghiChu', 'borrow')->count();
    }

    public function getAuthPassword()
    {
        return $this->matKhau;
    }
}
