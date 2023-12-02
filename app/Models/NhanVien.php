<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhan_viens';

    protected $fillable = [
        'ma_nhan_vien',
        'ho_va_ten',
        'sdt',
        'que_quan',
        'ma_chuc_vu',
        'ma_phong_ban',
        'ma_bac_luong',
    ];
}
