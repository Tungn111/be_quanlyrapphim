<?php

use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\PhongChieuController;
use App\Http\Controllers\PhimController;
use App\Http\Controllers\SuatChieuController;
use App\Http\Controllers\VeController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DonHangController;
use Illuminate\Support\Facades\Route;

    Route::get('/phong-chieu/get-data', [PhongChieuController::class, 'getData']);
    Route::post('/phong-chieu/add-data', [PhongChieuController::class, 'addData']);
    Route::post('/phong-chieu/update', [PhongChieuController::class, 'update']);
    Route::post('/phong-chieu/delete', [PhongChieuController::class, 'destroy']);
    Route::post('/phong-chieu/change-status', [PhongChieuController::class, 'changeStatus']);
    Route::post('/phong-chieu/tao-ghe-auto', [PhongChieuController::class, 'taoGheAuto']);
    Route::post('/phong-chieu/tim-kiem', [PhongChieuController::class, 'search']);


    Route::get('/phim/get-data', [PhimController::class, 'getData']);
    Route::post('/phim/add-data', [PhimController::class, 'addData']);
    Route::post('/phim/update', [PhimController::class, 'update']);
    Route::post('/phim/delete', [PhimController::class, 'destroy']);
    Route::post('/phim/change-status', [PhimController::class, 'changeStatus']);
    Route::post('/phim/tim-kiem', [PhimController::class, 'search']);

    Route::get('/suat-chieu/get-data', [SuatChieuController::class, 'getData']);
    Route::post('/suat-chieu/add-data', [SuatChieuController::class, 'addData']);
    Route::post('/suat-chieu/update', [SuatChieuController::class, 'update']);
    Route::post('/suat-chieu/delete', [SuatChieuController::class, 'destroy']);
    Route::post('/suat-chieu/change-status', [SuatChieuController::class, 'changeStatus']);
    Route::post('/suat-chieu/tao-ve-auto', [SuatChieuController::class, 'taoVeAuto']);
    Route::post('/suat-chieu/tim-kiem', [SuatChieuController::class, 'search']);


    Route::get('/nhan-vien/get-data', [NhanVienController::class, 'getData']);
    Route::post('/nhan-vien/add-data', [NhanVienController::class, 'addData']);
    Route::post('/nhan-vien/update', [NhanVienController::class, 'update']);
    Route::post('/nhan-vien/delete', [NhanVienController::class, 'destroy']);
    Route::post('/nhan-vien/change-status', [NhanVienController::class, 'changeStatus']);
    Route::post('/nhan-vien/tim-kiem', [NhanVienController::class, 'search']);
    Route::post('/admin/dang-nhap', [NhanVienController::class, 'dangNhap']);

    Route::get('/voucher/get-data', [VoucherController::class, 'getData']);
    Route::post('/voucher/add-data', [VoucherController::class, 'addData']);
    Route::post('/voucher/update', [VoucherController::class, 'update']);
    Route::post('/voucher/delete', [VoucherController::class, 'destroy']);
    Route::post('/voucher/change-status', [VoucherController::class, 'changeStatus']);
    Route::post('/dat-ve/thanh-toan', [DonHangController::class, 'thanhToan']);

    Route::get('/ve/get-data', [VeController::class, 'getData']);
    Route::post('/ve/add-data', [VeController::class, 'addData']);
    Route::post('/ve/update', [VeController::class, 'update']);
    Route::post('/ve/delete', [VeController::class, 'destroy']);
    Route::post('/ve/soat-ve', [VeController::class, 'soatVe']);
