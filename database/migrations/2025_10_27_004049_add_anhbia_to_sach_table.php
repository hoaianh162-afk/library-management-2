<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sach', function (Blueprint $table) {
            $table->string('anhBia')->nullable()->after('vitri'); 
        });
    }

    public function down(): void
    {
        Schema::table('sach', function (Blueprint $table) {
            $table->dropColumn('anhBia');
        });
    }
};
