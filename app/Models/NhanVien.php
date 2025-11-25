<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class NhanVien extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'nhan_viens';

    protected $fillable = [
        'email',
        'ho_va_ten',
        'password',
        'so_dien_thoai',
        'dia_chi',
        'ngay_sinh',
        'tinh_trang',
        'avatar',
        'id_chuc_vu',
        'is_master',
        'hash_reset'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'ngay_sinh' => 'date',
    ];
}
