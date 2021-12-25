<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;// khai báo để úp ảnh
use App\Models\SanPham;
use App\Models\ThuongHieu;
use App\Models\DanhMuc;
use App\Models\TrangThai;
use Illuminate\Support\Facades\Validator;

class SanPhamController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach(Request $res)
    {
        $danhMuc = DanhMuc::all();
        $thuongHieu = ThuongHieu::all();
        $trangThai = TrangThai::all();

        // lấy thông tin tìm kiếm
        $tuKhoa = $res->input('tuKhoa');
        $dm = $res->input('tkDanhMuc');
        $th = $res->input('tkThuongHieu');
        
        // echo "Từ khóa: " . $tuKhoa . "</br>";
        // echo "Danh mục: " . $dm . "</br>";
        // echo "Thương hiệu: " . $th;

        // xử lý tìm kiếm
        $sanPham = SanPham::where(function ($q) use($tuKhoa)
        {
            $q->orwhere('TenSanPham', 'like', '%' . $tuKhoa . '%')->orwhere('AnhSanPham', 'like', '%' . $tuKhoa . '%');
        });

        if (isset($dm))
        {
            $sanPham = $sanPham->where('DanhMucId', $dm);
        }

        if(isset($th))
        {
            $sanPham = $sanPham->where('ThuongHieuId', $th);
        }
        
        // $sanPham->dump();
        $sanPham = $sanPham->orderBy('NgayTao', 'desc')->paginate(10);
        // bổ sung tiêu chí tìm kiếm
        $sanPham = $sanPham->appends(['tuKhoa'=>$tuKhoa, 'tkDanhMuc'=>$dm, 'tkThuongHieu'=>$th]);


        return view('SanPham.DanhSach', ['sanPhams'=>$sanPham, 'tuKhoa'=>$tuKhoa, 'danhMucs'=>$danhMuc, 'thuongHieus'=>$thuongHieu, 'trangThais'=>$trangThai, 'maDM'=>$dm, 'maTH'=>$th]);
    }


    // hàm hiển thị form thêm mới
    public function hienThiThemMoi()
    {
        $danhMuc = DanhMuc::all();
        $thuongHieu = ThuongHieu::all();
        $trangThai = TrangThai::all();
        
        return view('SanPham.SanPhamAdd', ['danhMucs'=>$danhMuc, 'thuongHieus'=>$thuongHieu, 'trangThais'=>$trangThai]);
    }

    // hàm thực hiện thêm mới
    public function themMoi(Request $res)
    {
        $danhMuc = DanhMuc::all();
        $thuongHieu = ThuongHieu::all();
        $trangThai = TrangThai::all();
        $validator = Validator::make($res->all(),
            [
                'TenSanPham'=>'required|min:15',
                'GiaSanPham'=>'required',
                'ThuongHieuId'=>'required',
                'DanhMucId'=>'required'
            ],
            [
                'TenSanPham.required'=>'Bạn phải nhập tên sản phẩm',
                'TenSanPham.min'=>'Bạn phải nhập tên sản phẩm tối thiểu 15 kí tự',
                'GiaSanPham.required'=>'Bạn phải nhập giá sản phẩm',
                'DanhMucId.required'=>'Bạn phải nhập danh mục sản phẩm',
                'ThuongHieuId.required'=>'Bạn phải nhập thương hiệu sản phẩm'
            ]
        );
        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin');

        $sanPham = new SanPham($res->all());
        
        if ($validator->fails()) {
            return view('SanPham.SanPhamAdd', ['sanPhams'=>$sanPham, 'danhMucs'=>$danhMuc, 'thuongHieus'=>$thuongHieu, 'trangThais'=>$trangThai])->withErrors($validator);
        }
        else {
            $sanPham->NgayTao = now();
            $sanPham->DaDuyet = 0;
            if ($res->input('SoLuong') == 0)
            {
                $sanPham->TrangThaiId = 2;// hết hàng
            } else
            {
                $sanPham->TrangThaiId = $res->input('TrangThaiId');// còn hàng or sắp về
            }

            $anh = $res->AnhSP;
            if($res->hasFile('AnhSP'))
            {
                $fileName = $anh->getClientOriginalName();
                $extension = explode(".",$fileName);
                $format_ex = end($extension);
                $allowed_type = array("jpg", "jpeg", "png", "gif");
                if (in_array($format_ex,$allowed_type))
                {
                    $anh->storeAs('images', $fileName);
                    $sanPham->AnhSanPham = $fileName;

                    $sanPham->save();
                    return redirect('/sanpham/danhsach');
                }
                else {
                    $class = 'alert-danger';
                    $thongBao = 'Upload file ảnh không thành công!';
                    return view('SanPham.SanPhamAdd', ['sanPhams'=>$sanPham, 'danhMucs'=>$danhMuc, 'thuongHieus'=>$thuongHieu, 'trangThais'=>$trangThai, 'class'=>$class, 'thongBao'=>$thongBao]);
                }
            }
        }
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $danhMuc = DanhMuc::all();
        $thuongHieu = ThuongHieu::all();
        $sanPham = SanPham::find($id);
        return view('SanPham.SanPhamEdit', ['sanPhams'=>$sanPham, 'danhMucs'=>$danhMuc, 'thuongHieus'=>$thuongHieu]);
    }

    // hàm xem chi tiết
    public function xemTruoc($id)
    {
        $danhMuc = DanhMuc::all();
        $thuongHieu = ThuongHieu::all();
        $trangThai = TrangThai::all();
        $sanPham = SanPham::find($id);
        return view('SanPham.SanPhamInfo', ['sanPhams'=>$sanPham, 'danhMucs'=>$danhMuc, 'thuongHieus'=>$thuongHieu, 'trangThais'=>$trangThai]);
    }

    // cập nhật tình trạng sp, duyệt, ngày duyệt
    public function capNhat(Request $res, $id)
    {
        // $trangThai = TrangThai::all();
        $sanPham = SanPham::find($id);

        if ($res->TrangThaiId != $sanPham->TrangThaiId)
        {
            $sanPham->TrangThaiId = $res->input('TrangThaiId');
        } else {
            $sanPham->TrangThaiId = $sanPham->TrangThaiId;
        }

        if ($res->DaDuyet == 0)
        {
            $sanPham->DaDuyet = $res->input('DaDuyet');
            $sanPham->NgayDuyet = null;
        }
        elseif ($res->DaDuyet != $sanPham->DaDuyet || $res->DaDuyet == 1)
        {
            $sanPham->DaDuyet = $res->input('DaDuyet');
            $sanPham->NgayDuyet = now();
        }
        
        $sanPham->NgaySua = now();
        $sanPham->save();
        
        // return view('SanPham.SanPhaminfo', ['thongBao'=>$thongBao, 'sanPhams'=>$sanPham, 'trangThais'=>$trangThai]);
        return redirect()->back()->with(['class'=>'alert-success', 'thongBao'=>'Cập nhật thành công!']);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $danhMuc = DanhMuc::all();
        $thuongHieu = ThuongHieu::all();
        $trangThai = TrangThai::all();
        $sanPham = SanPham::find($id);

        $sanPham->TenSanPham = $res->input('TenSanPham');
        $sanPham->GiaSanPham = $res->input('GiaSanPham');
        $sanPham->GiaKhuyenMai = $res->input('GiaKhuyenMai');
        $sanPham->SoLuong = $res->input('SoLuong');
        if ($res->input('SoLuong') == 0) {
            $sanPham->TrangThaiId = 2; //hết hàng
        } else {
            $sanPham->TrangThaiId = 1; //còn hàng
        }
        $sanPham->DonVi = $res->input('DonVi');
        $sanPham->DanhMucId = $res->input('DanhMucId');
        $sanPham->ThuongHieuId = $res->input('ThuongHieuId');
        $sanPham->MoTa = $res->input('MoTa');
        $sanPham->NoiDung = $res->input('NoiDung');
        $sanPham->NgaySua = now();
        $anh = $res->AnhSP;
        if($res->hasFile('AnhSP'))
        {
            $fileName = $anh->getClientOriginalName();
            $extension = explode(".",$fileName);
            $format_ex = end($extension);
            $allowed_type = array("jpg", "jpeg", "png", "gif");
            if (in_array($format_ex,$allowed_type))
            {
                storage::delete('/images/' . $sanPham->AnhSanPham);
                $anh->storeAs('images', $fileName);
                $sanPham->AnhSanPham = $fileName;
        
                $sanPham->save();
                return redirect('/sanpham/danhsach');
            }
            else {
                $class = 'alert-danger';
                $thongBao = 'Upload file ảnh không thành công!';
                return view('SanPham.SanPhamEdit', ['sanPhams'=>$sanPham, 'danhMucs'=>$danhMuc, 'thuongHieus'=>$thuongHieu, 'trangThais'=>$trangThai, 'class'=>$class, 'thongBao'=>$thongBao]);
            }
        }
        
        $sanPham->save();
        return redirect('/sanpham/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $sanPham = SanPham::find($id);
        $sanPham->forceDelete();
        storage::delete('/images/' . $sanPham->AnhSanPham);
        return redirect('/sanpham/danhsach');
    }
}
