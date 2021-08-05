<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ChuDe;
use Illuminate\Support\Facades\Validator;

class ChuDeController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach()
    {
        $chuDe = ChuDe::all();
        return view('chude.danhsach', ['chuDes'=>$chuDe]);
    }


    // hàm hiển thị form thêm mới
    public function hienThiThemMoi()
    {
        return view('chude.chudeadd');
    }

    // hàm thực hiện thêm mới
    public function themMoi(Request $res)
    {
        $validator = Validator::make($res->all(),
            [
                'Id'=>'required|min:2',
                'TenChuDe'=>'required|min:3'
            ],
            [
                'Id.required'=>'Bạn phải nhập mã chủ đề',
                'Id.min'=>'Bạn phải nhập mã chủ đề tối thiểu 2 ký tự',
                'TenChuDe.required'=>'Bạn phải nhập trường chủ đề',
                'TenChuDe.min'=>'Bạn phải nhập trường chủ đề tối thiểu 3 kí tự'
            ]
        );

        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin!');

        $chuDe = new ChuDe($res->all());
        if ($validator->fails()) {
            return view('chude.chudeadd', ['chuDes'=>$chuDe])->withErrors($validator);
        }
        
        $chuDe->save();

        return redirect('/chude/danhsach');
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $chuDe = ChuDe::find($id);
        return view('chude.chudeedit', ['chuDes'=>$chuDe]);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $chuDe = ChuDe::find($id);

        $chuDe->TenChuDe = $res->input('TenChuDe');
        $chuDe->MoTa = $res->input('MoTa');
        $chuDe->save();

        return redirect('/chude/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $chuDe = ChuDe::find($id);
        $chuDe->forceDelete();
        return redirect('/chude/danhsach');
    }
}