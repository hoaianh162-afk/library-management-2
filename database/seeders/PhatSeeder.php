<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\NguoiDung;
use App\Models\PhieuTra;
use App\Models\PhieuMuonChiTiet;

class PhatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = NguoiDung::where('vaiTro', '<>', 'admin')->get();
        $phieuTras = PhieuTra::all();
        $phieuMuonChiTiets = PhieuMuonChiTiet::all();

        if ($users->isEmpty() || $phieuMuonChiTiets->isEmpty()) {
            $this->command->info('Không có dữ liệu để tạo seed cho bảng phat!');
            return;
        }

        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $user = $users[$i % $users->count()];
            $phieuTra = $phieuTras->count() ? $phieuTras[$i % $phieuTras->count()] : null;
            $ct = $phieuMuonChiTiets[$i % $phieuMuonChiTiets->count()];

            // Random số ngày trễ từ 0 đến 5
            $soNgayTre = rand(0, 5);

            $soTienPhat = $soNgayTre * 5000; // 5.000 VNĐ / ngày trễ

            $data[] = [
                'idPhieuTra' => $soNgayTre > 0 && $phieuTra ? $phieuTra->idPhieuTra : null,
                'idPhieuMuonChiTiet' => $ct->idPhieuMuonChiTiet,
                'idNguoiDung' => $user->idNguoiDung,
                'soNgayTre' => $soNgayTre,
                'soTienPhat' => $soTienPhat,
                'trangThaiThanhToan' => $soNgayTre > 0 ? 'pending' : 'paid',
                'ghiChu' => $soNgayTre > 0 ? "Trả sách muộn $soNgayTre ngày" : "Trả đúng hạn",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('phat')->insert($data);

        $this->command->info('Seed bảng phat đã được tạo!');
    }
}
