<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhongBanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Khi seeder thì ta muốn xóa toàn bộ dữ liệu ở table đó
        DB::table('phong_bans')->delete();

        // Reset id về lại 1
        DB::table('phong_bans')->truncate();

        // 2. Ta sẽ thêm mới phim bằng lệnh create
        DB::table('phong_bans')->insert([
            [
                'ma_phong_ban'      => "KHTC",
                'ten_phong_ban'     => "Phòng tài chính kế toán",
                'dia_chi_phong_ban' => "254 Nguyễn Văn Linh",
                'sdt_phong_ban'     => "0987654321",
            ],
            [
                'ma_phong_ban'      => "MAR",
                'ten_phong_ban'     => "Phòng marketing",
                'dia_chi_phong_ban' => "03 Quang Trung",
                'sdt_phong_ban'     => "0987654321",
            ],
            [
                'ma_phong_ban'      => "R&D",
                'ten_phong_ban'     => "Phòng nghiên cứu và phát triển",
                'dia_chi_phong_ban' => "01 Hoàng Minh Thảo",
                'sdt_phong_ban'     => "0987654321",
            ],
            [
                'ma_phong_ban'      => "T&T",
                'ten_phong_ban'     => "Phòng kỹ thuật – Công nghệ",
                'dia_chi_phong_ban' => "137 Nguyễn Văn Linh",
                'sdt_phong_ban'     => "0987654321",
            ],
        ]);
        // php artisan db:seed --class="PhimSeeder"
    }
}
