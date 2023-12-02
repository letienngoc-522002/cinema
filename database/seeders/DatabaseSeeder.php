<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        $this->call(PhongBanSeeder::class);
        $this->call(LuongSeeder::class);
        $this->call(ChucVuSeeder::class);
        $this->call(NhanVienSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
