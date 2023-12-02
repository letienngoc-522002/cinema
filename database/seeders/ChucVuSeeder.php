<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChucVuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Khi seeder thì ta muốn xóa toàn bộ dữ liệu ở table đó
        DB::table('chuc_vus')->delete();

        // Reset id về lại 1
        DB::table('chuc_vus')->truncate();

        // 2. Ta sẽ thêm mới phim bằng lệnh create
        DB::table('chuc_vus')->insert([
            [
                'ma_chuc_vu'    => "NVBH",
                'ten_chuc_vu'   => "Nhân viên bán hàng",
            ],

            [
                'ma_chuc_vu'    => "QLK",
                'ten_chuc_vu'   => "Quản lý kho",
            ],

            [
                'ma_chuc_vu'    => "TPKT",
                'ten_chuc_vu'   => "Trưởng phòng kế toán",
            ],

            [
                'ma_chuc_vu'    => "GD",
                'ten_chuc_vu'   => "Giám đốc",
            ],

            [
                'ma_chuc_vu'    => "NVKT",
                'ten_chuc_vu'   => "Nhân viên kế toán",
            ],


        ]);
        // php artisan db:seed --class="PhimSeeder"
    }
}
