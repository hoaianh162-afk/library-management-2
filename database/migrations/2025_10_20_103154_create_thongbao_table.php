<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('thong_bao', function (Blueprint $table) {
            $table->id('idThongBao');
            $table->unsignedBigInteger('idNguoiDung');
            $table->unsignedBigInteger('idSach')->nullable();
            $table->unsignedBigInteger('idPhieuMuon')->nullable();
            $table->unsignedBigInteger('idPhat')->nullable();
            $table->unsignedBigInteger('idDatCho')->nullable();
            $table->unsignedBigInteger('idPhieuTra')->nullable();
            $table->string('loaiThongBao', 50)->nullable();
            $table->text('noiDung')->nullable();
            $table->dateTime('thoiGianGui')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('trangThai', 20)->default('unread');
            $table->timestamps();

            $table->foreign('idNguoiDung')->references('idNguoiDung')->on('nguoi_dung')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idSach')->references('idSach')->on('sach')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('idPhieuMuon')->references('idPhieuMuon')->on('phieu_muon')->onDelete('set null')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thongbao');
    }
};
