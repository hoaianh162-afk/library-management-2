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
        Schema::create('phieu_muon_chi_tiet', function (Blueprint $table) {
            $table->id('idPhieuMuonChiTiet');
            $table->unsignedBigInteger('idPhieuMuon');
            $table->unsignedBigInteger('idSach');
            $table->date('borrow_date')->nullable();
            $table->date('due_date')->nullable();
            $table->date('return_date')->nullable();
            $table->string('trangThaiCT', 20)->default('borrowed');
            $table->string('ghiChu', 255)->nullable();
            $table->timestamps();

            $table->foreign('idPhieuMuon')->references('idPhieuMuon')->on('phieu_muon')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idSach')->references('idSach')->on('sach')->onDelete('restrict')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phieumuonchitiet');
    }
};
