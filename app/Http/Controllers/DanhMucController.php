<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DanhMuc;
use Illuminate\Support\Facades\Validator;

class DanhMucController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach()
    {
        $danhMuc = DanhMuc::all();
        return view('DanhMuc.DanhSach', ['danhMucs'=>$danhMuc]);
    }


    // hàm hiển thị form thêm mới
    public function hienThiThemMoi()
    {
        return view('DanhMuc.DanhMucAdd');
    }

    // hàm thực hiện thêm mới
    public function themMoi(Request $res)
    {
        $validator = Validator::make($res->all(),
            [
                'Id'=>'required|min:2',
                'DanhMuc'=>'required|min:3'
            ],
            [
                'Id.required'=>'Bạn phải nhập mã danh mục',
                'Id.min'=>'Bạn phải nhập mã danh mục tối thiểu 2 ký tự',
                'DanhMuc.required'=>'Bạn phải nhập tên danh mục',
                'DanhMuc.min'=>'Bạn phải nhập tên danh mục tối thiểu 3 kí tự'
            ]
        );

        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin!');

        $danhMuc = new DanhMuc($res->all());
        if ($validator->fails()) {
            return view('DanhMuc.DanhMucAdd', ['danhMucs'=>$danhMuc])->withErrors($validator);
        }

        $danhMuc->save();

        return redirect('/danhmuc/danhsach');
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $danhMuc = DanhMuc::find($id);
        return view('DanhMuc.DanhMucEdit', ['danhMucs'=>$danhMuc]);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $danhMuc = DanhMuc::find($id);

        $danhMuc->DanhMuc = $res->input('DanhMuc');
        $danhMuc->MoTa = $res->input('MoTa');
        $danhMuc->save();

        return redirect('/danhmuc/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $danhMuc = DanhMuc::find($id);
        $danhMuc->forceDelete();
        return redirect('/danhmuc/danhsach');
    }
}
