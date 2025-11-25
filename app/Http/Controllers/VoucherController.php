<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function getData()
    {
        $data = Voucher::all();
        return response()->json([
            'status' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $data
        ]);
    }

    public function addData(Request $request)
    {
        Voucher::create([
            'ma_code'               => $request->ma_code,
            'thoi_gian_bat_dau'     => $request->thoi_gian_bat_dau,
            'thoi_gian_ket_thuc'    => $request->thoi_gian_ket_thuc,
            'so_giam_gia'           => $request->so_giam_gia,
            'so_tien_toi_da'        => $request->so_tien_toi_da,
            'so_tien_giam_gia'      => $request->so_tien_giam_gia,
            'tinh_trang'            => $request->tinh_trang
        ]);
        return response()->json([
            'status' => true,
            'message' => 'Thêm voucher thành công',
        ]);
    }


    public function update(Request $request)
    {
        Voucher::where('id', $request->id)->update([
            'ma_code'               => $request->ma_code,
            'thoi_gian_bat_dau'     => $request->thoi_gian_bat_dau,
            'thoi_gian_ket_thuc'    => $request->thoi_gian_ket_thuc,
            'so_giam_gia'           => $request->so_giam_gia,
            'so_tien_toi_da'        => $request->so_tien_toi_da,
            'so_tien_giam_gia'      => $request->so_tien_giam_gia,
            'tinh_trang'            => $request->tinh_trang
        ]);


        return response()->json([
            'status' => true,
            'message' => 'Cập nhật voucher thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        Voucher::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa voucher thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $voucher = Voucher::where('id', $request->id)->first();
        $voucher->tinh_trang = !$voucher->tinh_trang;
        $voucher->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái voucher thành công',
        ]);
    }
}
