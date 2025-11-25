<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuatChieuController extends Controller
{
    //
    public function getData()
    {
        $suatChieu = SuatChieu::join('phims', 'phims.id', 'suat_chieus.id_phim')
            ->join('phong_chieus', 'phong_chieus.id', 'suat_chieus.id_phong_chieu')
            ->select('suat_chieus.*', 'phims.ten_phim', 'phong_chieus.ten_phong')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'Lấy dữ liệu thành công',
            'data' => $suatChieu
        ]);
    }

    public function addData(Request $request)
    {
        $id_chuc_nang = 2;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        SuatChieu::create([
            'id_phim'           => $request->id_phim,
            'id_phong_chieu'    => $request->id_phong_chieu,
            'ngay_chieu'        => $request->ngay_chieu,
            'thoi_gian_bat_dau' => $request->thoi_gian_bat_dau,
            'thoi_gian_ket_thuc' => $request->thoi_gian_ket_thuc,
            'tinh_trang'        => $request->tinh_trang
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Thêm suất chiếu thành công',
        ]);
    }

    public function update(Request $request)
    {
        $id_chuc_nang = 2;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        SuatChieu::where('id', $request->id)->update([
            'id_phim'           => $request->id_phim,
            'id_phong_chieu'    => $request->id_phong_chieu,
            'ngay_chieu'        => $request->ngay_chieu,
            'thoi_gian_bat_dau' => $request->thoi_gian_bat_dau,
            'thoi_gian_ket_thuc' => $request->thoi_gian_ket_thuc,
            'tinh_trang'        => $request->tinh_trang
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Cập nhật suất chiếu thành công',
        ]);
    }

    public function destroy(Request $request)
    {
        $id_chuc_nang = 2;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        SuatChieu::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa suất chiếu thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 2;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $suat_chieu = SuatChieu::where('id', $request->id)->first();
        $suat_chieu->tinh_trang = !$suat_chieu->tinh_trang;
        $suat_chieu->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái suất chiếu thành công',
        ]);
    }

    public function taoVeAuto(Request $request)
    {
        $id_chuc_nang = 2;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $check = Ve::where('id_suat_chieu', $request->id)->first();
        if ($check) {
            return response()->json([
                'status' => 0,
                'message' => 'Đã tạo vé cho suất chiếu này',
            ]);
        }

        $danhSachGhe = Ghe::where('id_phong_chieu', $request->id_phong_chieu)->get();
        $data = $request->all();


        if (count($danhSachGhe) > 0) {
            foreach ($danhSachGhe as $ghe) {
                do {
                    $ma_ve = 've' . substr(Str::uuid()->toString(), 0, 8);
                } while (Ve::where('ma_ve', $ma_ve)->exists());
                Ve::create([
                    'ma_ve'             => $ma_ve,
                    'gia_ve'            => $ghe->gia_ghe,
                    'id_don_hang'       => 0,
                    'id_suat_chieu'     => $request->id,
                    'ten_ghe'           => $ghe->ten_ghe,
                    'tinh_trang'        => $ghe->tinh_trang,
                ]);
            }
            return response()->json([
                'status' => true,
                'message' => 'Tạo vé tự động cho suất chiếu thành công',
                'data'  => $data
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Phòng chiếu này hiện chưa có ghế',
            ]);
        }
    }'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        SuatChieu::where('id', $request->id)->delete();
        return response()->json([
            'status' => true,
            'message' => 'Xóa suất chiếu thành công',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $id_chuc_nang = 2;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $suat_chieu = SuatChieu::where('id', $request->id)->first();
        $suat_chieu->tinh_trang = !$suat_chieu->tinh_trang;
        $suat_chieu->save();

        return response()->json([
            'status' => true,
            'message' => 'Thay đổi trạng thái suất chiếu thành công',
        ]);
    }

    public function taoVeAuto(Request $request)
    {
        $id_chuc_nang = 2;
        $id_chuc_vu   = Auth::guard('sanctum')->user()->id_chuc_vu;
        $check        = PhanQuyen::where('id_chuc_vu', $id_chuc_vu)->where('id_chuc_nang', $id_chuc_nang)->first();
        if (!$check) {
            return response()->json([
                'status'    =>  0,
                'message'   =>  'Bạn không có quyền thực hiện chức năng này!'
            ]);
        }
        $check = Ve::where('id_suat_chieu', $request->id)->first();
        if ($check) {
            return response()->json([
                'status' => 0,
                'message' => 'Đã tạo vé cho suất chiếu này',
            ]);
        }

        $danhSachGhe = Ghe::where('id_phong_chieu', $request->id_phong_chieu)->get();
        $data = $request->all();


        if (count($danhSachGhe) > 0) {
            foreach ($danhSachGhe as $ghe) {
                do {
                    $ma_ve = 've' . substr(Str::uuid()->toString(), 0, 8);
                } while (Ve::where('ma_ve', $ma_ve)->exists());
                Ve::create([
                    'ma_ve'             => $ma_ve,
                    'gia_ve'            => $ghe->gia_ghe,
                    'id_don_hang'       => 0,
                    'id_suat_chieu'     => $request->id,
                    'ten_ghe'           => $ghe->ten_ghe,
                    'tinh_trang'        => $ghe->tinh_trang,
                ]);
            }
            return response()->json([
                'status' => true,
                'message' => 'Tạo vé tự động cho suất chiếu thành công',
                'data'  => $data
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'message' => 'Phòng chiếu này hiện chưa có ghế',
            ]);
        }
    }
}
