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
        Schema::create('luongs', function (Blueprint $table) {
            $table->id();
            $table->string('bac_luong');
            $table->double('luong_co_so');
            $table->double('he_so_luong');
            $table->double('he_so_phu_cap');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('luongs');
    }
};
