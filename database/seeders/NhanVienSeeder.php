<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NhanVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Khi seeder thì ta muốn xóa toàn bộ dữ liệu ở table đó
        DB::table('nhan_viens')->delete();

        // Reset id về lại 1
        DB::table('nhan_viens')->truncate();

        // 2. Ta sẽ thêm mới phim bằng lệnh create
        DB::table('nhan_viens')->insert([
            [
                'ma_nhan_vien'    => "NV01",
                'ho_va_ten'       => "Nguyễn Văn A",
                'sdt'             => "0976582314",
                'que_quan'        => "Đà Nẵng",
                'ma_chuc_vu'      => 1,
                'ma_phong_ban'    => 2,
                'ma_bac_luong'       => 2
            ],
            [
                'ma_nhan_vien'    => "NV02",
                'ho_va_ten'       => "Trần Thị B",
                'sdt'             => "0987654321",
                'que_quan'        => "Hà Nội",
                'ma_chuc_vu'      => 2,
                'ma_phong_ban'    => 3,
                'ma_bac_luong'       => 1
            ],

            [
                'ma_nhan_vien'    => "NV03",
                'ho_va_ten'       => "Lê Văn C",
                'sdt'             => "0965432109",
                'que_quan'        => "Hồ Chí Minh",
                'ma_chuc_vu'      => 3,
                'ma_phong_ban'    => 4,
                'ma_bac_luong'       => 2
            ],

            [
                'ma_nhan_vien'    => "NV04",
                'ho_va_ten'       => "Phạm Thị D",
                'sdt'             => "0912345678",
                'que_quan'        => "Cần Thơ",
                'ma_chuc_vu'      => 4,
                'ma_phong_ban'    => 1,
                'ma_bac_luong'       => 4
            ],

            [
                'ma_nhan_vien'    => "NV05",
                'ho_va_ten'       => "Ngô Văn E",
                'sdt'             => "0901234567",
                'que_quan'        => "Hải Phòng",
                'ma_chuc_vu'      => 5,
                'ma_phong_ban'    => 2,
                'ma_bac_luong'       => 5
            ],

        ]);
        // php artisan db:seed --class="PhimSeeder"
    }
}
