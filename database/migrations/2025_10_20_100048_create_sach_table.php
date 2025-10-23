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
        Schema::create('sach', function (Blueprint $table) {
            $table->id('idSach');
            $table->string('maSach', 50)->nullable()->index();
            $table->string('tenSach', 200)->index();
            $table->string('tacGia', 200)->nullable();
            $table->year('namXuatBan')->nullable();
            $table->integer('soLuong')->default(1);
            $table->unsignedBigInteger('idDanhMuc');
            $table->text('moTa')->nullable();
            $table->string('vitri', 100)->nullable();
            $table->string('trangThai', 20)->default('available');
            $table->timestamps();

            $table->foreign('idDanhMuc')->references('idDanhMuc')->on('danh_muc')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sach');
    }
};
