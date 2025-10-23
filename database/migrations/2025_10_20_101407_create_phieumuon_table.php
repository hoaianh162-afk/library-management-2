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
        Schema::create('phieu_muon', function (Blueprint $table) {
            $table->id('idPhieuMuon');
            $table->unsignedBigInteger('idNguoiDung');
            $table->date('ngayMuon');
            $table->date('hanTra');
            $table->string('trangThai', 20)->default('pending');
            $table->string('ghiChu', 255)->nullable();
            $table->timestamps();

            $table->foreign('idNguoiDung')->references('idNguoiDung')->on('nguoi_dung')->onUpdate('cascade')->onDelete('restrict');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieumuon');
    }
};
