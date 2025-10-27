<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\PhieuMuon;
use App\Models\Sach;

class PhieuMuonChiTietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $phieuMuons = PhieuMuon::all();
        $books = Sach::all();

        if ($phieuMuons->isEmpty() || $books->isEmpty()) {
            $this->command->info('Không có phiếu mượn hoặc sách nào để seed!');
            return;
        }

        // Tạm tắt kiểm tra FK để xóa dữ liệu cũ
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('phieu_muon_chi_tiet')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $phieu = $phieuMuons[$i % $phieuMuons->count()];
            $book = $books[$i % $books->count()];

            $returned = rand(0, 1) === 1; // 50% returned, 50% borrowed

            $borrowDate = Carbon::now()->subDays(rand(1, 10));
            $dueDate = (clone $borrowDate)->addDays(rand(5, 20));
            $returnDate = $returned ? (clone $borrowDate)->addDays(rand(1, 5)) : null;

            $trangThaiCT = $returned ? 'approved' : 'pending';
            $ghiChu = $returned ? 'return' : 'borrow';

            $data[] = [
                'idPhieuMuon' => $phieu->idPhieuMuon,
                'idSach' => $book->idSach,
                'borrow_date' => $borrowDate->toDateString(),
                'due_date' => $dueDate->toDateString(),
                'return_date' => $returnDate ? $returnDate->toDateString() : null,
                'trangThaiCT' => $trangThaiCT,
                'ghiChu' => $ghiChu,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        DB::table('phieu_muon_chi_tiet')->insert($data);

        $this->command->info('Seeder PhieuMuonChiTiet đã chạy thành công và dữ liệu mới đã được chèn!');
    }
}
