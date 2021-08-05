<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\VaiTro;
use Illuminate\Support\Facades\Validator;

class VaiTroController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach()
    {
        $vaiTro = VaiTro::all();
        return view('vaitro.danhsach', ['vaiTros'=>$vaiTro]);
    }


    // hàm hiển thị form thêm mới
    public function hienThiThemMoi()
    {
        return view('vaitro.vaitroadd');
    }

    // hàm thực hiện thêm mới
    public function themMoi(Request $res)
    {
        $validator = Validator::make($res->all(),
            [
                'Id'=>'required|min:2',
                'VaiTro'=>'required|min:3'
            ],
            [
                'Id.required'=>'Bạn phải nhập mã vai trò',
                'Id.min'=>'Bạn phải nhập mã vai trò tối thiểu 2 ký tự',
                'VaiTro.required'=>'Bạn phải nhập trường vai trò',
                'VaiTro.min'=>'Bạn phải nhập trường vai trò tối thiểu 3 kí tự'
            ]
        );

        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin!');

        $vaiTro = new VaiTro($res->all());
        if ($validator->fails()) {
            return view('vaitro.vaitroadd', ['vaiTros'=>$vaiTro])->withErrors($validator);
        }
        
        $vaiTro->save();

        return redirect('/vaitro/danhsach');
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $vaiTro = VaiTro::find($id);
        return view('vaitro.vaitroedit', ['vaiTros'=>$vaiTro]);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $vaiTro = VaiTro::find($id);

        $vaiTro->VaiTro = $res->input('VaiTro');
        $vaiTro->MoTa = $res->input('MoTa');
        $vaiTro->save();

        return redirect('/vaitro/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $vaiTro = VaiTro::find($id);
        $vaiTro->forceDelete();
        return redirect('/vaitro/danhsach');
    }
}
