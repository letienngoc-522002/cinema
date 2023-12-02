<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luong extends Model
{
    use HasFactory;

    protected $table = 'luongs';

    protected $fillable = [
        'bac_luong',
        'luong_co_so',
        'he_so_luong',
        'he_so_phu_cap',
    ];
}
