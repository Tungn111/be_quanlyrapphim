<?php

use App\Http\Controllers\PhongChieuController;
use Illuminate\Support\Facades\Route;



    Route::get('/phong-chieu/get-data', [PhongChieuController::class, 'getData']);
    Route::post('/phong-chieu/add-data', [PhongChieuController::class, 'addData']);
    Route::post('/phong-chieu/update', [PhongChieuController::class, 'update']);
    Route::post('/phong-chieu/delete', [PhongChieuController::class, 'destroy']);
    Route::post('/phong-chieu/change-status', [PhongChieuController::class, 'changeStatus']);
    Route::post('/phong-chieu/tao-ghe-auto', [PhongChieuController::class, 'taoGheAuto']);
    Route::post('/phong-chieu/tim-kiem', [PhongChieuController::class, 'search']);
