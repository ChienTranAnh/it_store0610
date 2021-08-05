<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\LoaiKhachHang;
use Illuminate\Support\Facades\Validator;

class LoaiKhachHangController extends Controller
{
    
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach()
    {
        $loaiKH = LoaiKhachHang::all();
        return view('loaikhachhang.danhsach', ['loaiKHs'=>$loaiKH]);
    }


    // hàm hiển thị form thêm mới
    public function hienThiThemMoi()
    {
        return view('loaikhachhang.loaiKHangadd');
    }

    // hàm thực hiện thêm mới
    public function themMoi(Request $res)
    {
        $validator = Validator::make($res->all(),
            [
                'Id'=>'required|min:2',
                'LoaiKhachHang'=>'required|min:3'
            ],
            [
                'Id.required'=>'Bạn phải nhập mã loại khách hàng',
                'Id.min'=>'Bạn phải nhập mã loại khách hàng tối thiểu 2 ký tự',
                'LoaiKhachHang.required'=>'Bạn phải nhập tên loại khách hàng',
                'LoaiKhachHang.min'=>'Bạn phải nhập tên loại khách hàng tối thiểu 3 kí tự'
            ]
        );

        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin!');

        $loaiKH = new LoaiKhachHang($res->all());
        if ($validator->fails()) {
            return view('loaikhachhang.loaiKHangadd', ['loaiKHs'=>$loaiKH])->withErrors($validator);
        }

        $loaiKH->save();

        return redirect('/loaikhang/danhsach');
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $loaiKH = LoaiKhachHang::find($id);
        return view('loaikhachhang.loaiKHangedit', ['loaiKHs'=>$loaiKH]);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $loaiKH = LoaiKhachHang::find($id);

        $loaiKH->TenLoaiKHang = $res->input('TenLoaiKHang');
        $loaiKH->MoTa = $res->input('MoTa');
        $loaiKH->save();

        return redirect('/loaikhang/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $loaiKH = LoaiKhachHang::find($id);
        $loaiKH->forceDelete();
        return redirect('/loaikhachhang/danhsach');
    }
}
