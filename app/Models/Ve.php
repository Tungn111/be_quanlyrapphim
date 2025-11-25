<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ve extends Model
{
    protected $table = 'ves';
    protected $fillable = [
        'ma_ve',
        'gia_ve',
        'id_don_hang',
        'id_suat_chieu',
        'ten_ghe',
        'tinh_trang'
    ];

    const CHUA_THANH_TOAN = 1;
    const DA_THANH_TOAN = 2;
    const DA_HUY = 0;
}
