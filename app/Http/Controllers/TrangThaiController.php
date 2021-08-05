<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrangThai;
use App\Models\TinhTrangDonHang;
use Illuminate\Support\Facades\Validator;

class TrangThaiController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach()
    {
        $trangThai = TrangThai::all();
        $tinhTrang = TinhTrangDonHang::all();
        return view('trangthai.danhsach', ['trangThais'=>$trangThai, 'tinhTrangs'=>$tinhTrang]);
    }


    // hàm hiển thị form thêm mới
    public function hienThiThemMoi()
    {
        return view('trangthai.trangthaiadd');
    }

    // hàm thực hiện thêm mới
    public function themMoi(Request $res)
    {
        $validator = Validator::make($res->all(),
            [
                'TrangThai'=>'required|min:3'
            ],
            [
                'TrangThai.required'=>'Bạn phải nhập trường trạng thái',
                'TrangThai.min'=>'Bạn phải nhập trường trạng thái tối thiểu 3 kí tự'
            ]
        );

        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin!');

        $trangThai = new TrangThai($res->all());
        if ($validator->fails()) {
            return view('trangthai.trangthaiadd', ['trangThais'=>$trangThai])->withErrors($validator);
        }

        $trangThai->save();

        return redirect('/trangthai/danhsach');
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $trangThai = TrangThai::find($id);
        return view('trangthai.trangthaiedit', ['trangThais'=>$trangThai]);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $trangThai = TrangThai::find($id);

        $trangThai->TrangThai = $res->input('TrangThai');
        $trangThai->MoTa = $res->input('MoTa');
        $trangThai->save();

        return redirect('/trangthai/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $trangThai = TrangThai::find($id);
        $trangThai->forceDelete();
        return redirect('/trangthai/danhsach');
    }
}
