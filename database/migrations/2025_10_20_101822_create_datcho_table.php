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
        Schema::create('dat_cho', function (Blueprint $table) {
            $table->id('idDatCho');
            $table->unsignedBigInteger('idNguoiDung');
            $table->unsignedBigInteger('idSach');
            $table->date('ngayDat');
            $table->string('status', 20)->default('waiting');
            $table->unsignedInteger('queueOrder')->default(0);
            $table->date('thoiGianHetHan')->nullable();
            $table->timestamps();

            $table->foreign('idNguoiDung')->references('idNguoiDung')->on('nguoi_dung')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('idSach')->references('idSach')->on('sach')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datcho');
    }
};
