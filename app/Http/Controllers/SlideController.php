<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;// khai báo để úp ảnh
use App\Models\Slide;
use Illuminate\Support\Facades\Validator;

class SlideController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach()
    {
        $slide = Slide::all();
        return view('slide.danhsach', ['slides'=>$slide]);
    }


    // hàm hiển thị form thêm mới
    public function hienThiThemMoi()
    {
        return view('slide.slideadd');
    }

    // hàm thực hiện thêm mới
    public function themMoi(Request $res)
    {
        $validator = Validator::make($res->all(),
            [
                'images'=>'required'
            ],
            [
                'images.required'=>'Bạn phải chọn ảnh tải lên',
            ]
        );
        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin!');

        $slide = new Slide($res->all());

        if ($validator->fails()) {
            return view('slide.slideadd', ['slides'=>$slide])->withErrors($validator);
        }

        // $photos = $res->images;
        $anh = $res->images;
        if($res->hasFile('images'))
        {
            // foreach ($photos as $anh)
            // {
                $fileName = $anh->getClientOriginalName();
                $anh->storeAs('slide', $fileName);
                $slide->Anh = $fileName;

            $slide->AnhChon = 1;

            $slide->save();
            // }
        }

        return redirect('/slide/danhsach');
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $slide = Slide::find($id);
        return view('slide.slideedit', ['slides'=>$slide]);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $slide = Slide::find($id);
        $anh = $res->images;

        if($res->hasFile('images'))
        {
            storage::delete('/slide/' . $slide->Anh);
            $fileName = $anh->getClientOriginalName();
            $anh->storeAs('slide', $fileName);
            $slide->Anh = $fileName;
        }
        
        $slide->TieuDe = $res->TieuDe;
        $slide->save();

        return redirect('/slide/danhsach');
    }

    // 
    public function capNhat(Request $res, $id)
    {
        // $trangThai = TrangThai::all();
        $slide = slide::find($id);

        $slide->AnhChon = $res->input('AnhChon');
        
        $slide->save();
        
        // return view('sanpham.sanphaminfo', ['thongBao'=>$thongBao, 'sanPhams'=>$sanPham, 'trangThais'=>$trangThai]);
        return redirect()->back()->with('thongBao', 'Cập nhật thành công!');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $slide = Slide::find($id);
        $slide->forceDelete();
        storage::delete('/slide/' . $slide->Anh);
        return redirect('/slide/danhsach');
    }
}
