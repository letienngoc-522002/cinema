<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhongBan extends Model
{
    use HasFactory;

    protected $table = 'phong_bans';

    protected $fillable = [
        'ma_phong_ban',
        'ten_phong_ban',
        'dia_chi_phong_ban',
        'sdt_phong_ban',
    ];
}
