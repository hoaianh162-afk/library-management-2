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
        Schema::create('nguoi_dung', function (Blueprint $table) {
            $table->id('idNguoiDung');
            $table->string('hoTen', 100);
            $table->string('email', 100)->unique();
            $table->string('matKhau', 255);
            $table->string('soDienThoai', 20)->nullable()->index();
            $table->string('diaChi', 255)->nullable();
            $table->string('vaiTro', 20)->default('reader');
            $table->date('ngayDangKy')->default(DB::raw('CURRENT_DATE'));
            $table->boolean('trangThai')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nguoidung');
    }
};
