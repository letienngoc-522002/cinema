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
        Schema::create('phong_bans', function (Blueprint $table) {
            $table->id();
            $table->string('ma_phong_ban');
            $table->string('ten_phong_ban');
            $table->string('dia_chi_phong_ban');
            $table->string('sdt_phong_ban');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phong_bans');
    }
};
