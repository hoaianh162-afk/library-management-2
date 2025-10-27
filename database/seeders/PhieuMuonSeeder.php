<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PhieuMuonSeeder extends Seeder
{
    public function run()
    {
        // Tạm tắt kiểm tra FK để xóa dữ liệu cũ
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('phieu_muon_chi_tiet')->truncate();
        DB::table('phieu_muon')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Lấy tất cả user có vaiTro = reader
        $readers = DB::table('nguoi_dung')->where('vaiTro', 'reader')->get();

        // Lấy tất cả sách
        $books = DB::table('sach')->pluck('idSach');

        if ($readers->isEmpty() || $books->isEmpty()) {
            $this->command->info('Không có reader hoặc sách để seed!');
            return;
        }

        $phieuMuonsData = [];
        $chiTietData = [];

        foreach ($readers as $reader) {
            // Mỗi reader tạo 1-3 phiếu mượn
            $numPhieu = rand(1, 3);
            for ($i = 0; $i < $numPhieu; $i++) {
                $ngayMuon = Carbon::now()->subDays(rand(1, 10));
                $hanTra = (clone $ngayMuon)->addDays(rand(5, 20));
                $trangThai = ['pending', 'approved', 'returned'][rand(0,2)];

                $phieuMuonsData[] = [
                    'idNguoiDung' => $reader->idNguoiDung,
                    'ngayMuon' => $ngayMuon->toDateString(),
                    'hanTra' => $hanTra->toDateString(),
                    'trangThai' => $trangThai,
                    'ghiChu' => 'Phiếu mượn của '.$reader->hoTen,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        // Chèn dữ liệu phiếu mượn
        DB::table('phieu_muon')->insert($phieuMuonsData);

        // Lấy lại tất cả phiếu mượn vừa tạo
        $phieuMuons = DB::table('phieu_muon')->get();

        foreach ($phieuMuons as $phieu) {
            // Mỗi phiếu mượn mượn 1-5 sách
            $numBooks = rand(1, min(5, $books->count()));
            $randomBooks = $books->random($numBooks);
            if (! $randomBooks instanceof \Illuminate\Support\Collection) {
                $randomBooks = collect([$randomBooks]);
            }

            foreach ($randomBooks as $idSach) {
                $returned = rand(0,1) === 1;

                $borrowDate = Carbon::parse($phieu->ngayMuon);
                $dueDate = (clone $borrowDate)->addDays(rand(5,20));
                $returnDate = $returned ? (clone $borrowDate)->addDays(rand(1,5)) : null;

                $chiTietData[] = [
                    'idPhieuMuon' => $phieu->idPhieuMuon,
                    'idSach' => $idSach,
                    'borrow_date' => $borrowDate->toDateString(),
                    'due_date' => $dueDate->toDateString(),
                    'return_date' => $returnDate ? $returnDate->toDateString() : null,
                    'trangThaiCT' => $returned ? 'approved' : 'pending',
                    'ghiChu' => $returned ? 'return' : 'borrow',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        // Chèn dữ liệu chi tiết phiếu mượn
        DB::table('phieu_muon_chi_tiet')->insert($chiTietData);

        $this->command->info('Seeder phiếu mượn và chi tiết đã chạy thành công!');
    }
}
