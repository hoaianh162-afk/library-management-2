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
        Schema::create('phat', function (Blueprint $table) {
            $table->id('idPhat');
            $table->unsignedBigInteger('idPhieuTra')->nullable();
            $table->unsignedBigInteger('idPhieuMuonChiTiet')->nullable();
            $table->unsignedBigInteger('idNguoiDung')->nullable();
            $table->integer('soNgayTre')->default(0);
            $table->decimal('soTienPhat', 10, 2)->default(0.00);
            $table->string('trangThaiThanhToan', 20)->default('pending');
            $table->string('ghiChu', 255)->nullable();
            $table->timestamps();

            $table->foreign('idPhieuTra')->references('idPhieuTra')->on('phieu_tra')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('idPhieuMuonChiTiet')->references('idPhieuMuonChiTiet')->on('phieu_muon_chi_tiet')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('idNguoiDung')->references('idNguoiDung')->on('nguoi_dung')->onDelete('set null')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phat');
    }
};
