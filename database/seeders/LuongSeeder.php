<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LuongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Khi seeder thì ta muốn xóa toàn bộ dữ liệu ở table đó
        DB::table('luongs')->delete();

        // Reset id về lại 1
        DB::table('luongs')->truncate();

        // 2. Ta sẽ thêm mới phim bằng lệnh create
        DB::table('luongs')->insert([
            [
                'bac_luong'         => "Bậc 1",
                'luong_co_so'       => 9238000,
                'he_so_luong'       => 6.20,
                'he_so_phu_cap'     => 1.3,
            ],
            [
                'bac_luong'         => "Bậc 2",
                'luong_co_so'       => 9774400,
                'he_so_luong'       => 6.56,
                'he_so_phu_cap'     => 1.38,
            ],
            [
                'bac_luong'         => "Bậc 3",
                'luong_co_so'       => 10310800,
                'he_so_luong'       => 6.69,
                'he_so_phu_cap'     => 1.41,
            ],
            [
                'bac_luong'         => "Bậc 4",
                'luong_co_so'       => 10847200,
                'he_so_luong'       => 7.28,
                'he_so_phu_cap'     => 1.48,
            ],
            [
                'bac_luong'         => "Bậc 5",
                'luong_co_so'       => 11383600,
                'he_so_luong'       => 7.64,
                'he_so_phu_cap'     => 2.2,
            ],

        ]);
        // php artisan db:seed --class="PhimSeeder"
    }
}
