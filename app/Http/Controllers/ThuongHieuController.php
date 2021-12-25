<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ThuongHieu;
use Illuminate\Support\Facades\Validator;

class ThuongHieuController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach()
    {
        $thuongHieu = thuonghieu::all();
        return view('ThuongHieu.DanhSach', ['thuongHieus'=>$thuongHieu]);
    }


    // hàm hiển thị form thêm mới
    public function hienThiThemMoi()
    {
        return view('ThuongHieu.ThuongHieuAdd');
    }

    // hàm thực hiện thêm mới
    public function themMoi(Request $res)
    {
        $validator = Validator::make($res->all(),
            [
                'Id'=>'required|min:2',
                'ThuongHieu'=>'required|min:2'
            ],
            [
                'Id.required'=>'Bạn phải nhập mã thương hiệu',
                'Id.min'=>'Bạn phải nhập mã thương hiệu tối thiểu 2 ký tự',
                'ThuongHieu.required'=>'Bạn phải nhập tên thương hiệu',
                'ThuongHieu.min'=>'Bạn phải nhập tên thương hiệu tối thiểu 2 kí tự'
            ]
        );

        $thuongHieu = new thuonghieu($res->all());

        if ($validator->fails()) {
            return view('ThuongHieu.ThuongHieuAdd', ['thuongHieus'=>$thuongHieu])->withErrors($validator);
        }
        $thuongHieu->save();

        return redirect('/thuonghieu/danhsach');
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $thuongHieu = thuonghieu::find($id);
        return view('ThuongHieu.ThuongHieuEdit', ['thuongHieus'=>$thuongHieu]);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $thuongHieu = thuonghieu::find($id);

        $thuongHieu->ThuongHieu = $res->input('ThuongHieu');
        $thuongHieu->MoTa = $res->input('MoTa');
        $thuongHieu->save();

        return redirect('/thuonghieu/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $thuongHieu = thuonghieu::find($id);
        $thuongHieu->forceDelete();
        return redirect('/thuonghieu/danhsach');
    }
}
