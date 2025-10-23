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
        Schema::create('phieu_tra', function (Blueprint $table) {
            $table->id('idPhieuTra');
            $table->unsignedBigInteger('idPhieuMuonChiTiet');
            $table->date('ngayTra');
            $table->string('trangThaiXuLy', 20)->default('processed');
            $table->string('ghiChu', 255)->nullable();
            $table->timestamps();

            $table->foreign('idPhieuMuonChiTiet')->references('idPhieuMuonChiTiet')->on('phieu_muon_chi_tiet')->onUpdate('cascade')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieutra');
    }
};
