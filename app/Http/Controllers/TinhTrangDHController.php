<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TinhTrangDonHang;
use App\Models\TrangThai;
use Illuminate\Support\Facades\Validator;

class TinhTrangDHController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach()
    {
        $trangThai = TrangThai::all();
        $tinhTrang = TinhTrangDonHang::all();
        return view('trangthai.danhsach', ['tinhTrangs'=>$tinhTrang, 'trangThais'=>$trangThai]);
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

        $tinhTrang = new TinhTrangDonHang($res->all());
        if ($validator->fails()) {
            return view('trangthai.trangthaiadd', ['trangThais'=>$tinhTrang])->withErrors($validator);
        }

        $tinhTrang->save();

        return redirect('/tinhtrang/danhsach');
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $tinhTrang = TinhTrangDonHang::find($id);
        return view('trangthai.trangthaiedit', ['trangThais'=>$tinhTrang]);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $tinhTrang = TinhTrangDonHang::find($id);

        $tinhTrang->TrangThai = $res->input('TrangThai');
        $tinhTrang->MoTa = $res->input('MoTa');
        $tinhTrang->save();

        return redirect('/tinhtrang/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $tinhTrang = TinhTrangDonHang::find($id);
        $tinhTrang->forceDelete();
        return redirect('/tinhtrang/danhsach');
    }
}
