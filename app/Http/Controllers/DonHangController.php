<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Support\Collection;
use App\Models\KhachHang;
use App\Models\DonHang;
use App\Models\TinhTrangDonHang;

class DonHangController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach(Request $res)
    {
        $khachHang = KhachHang::all();
        $tinhTrangDH = TinhTrangDonHang::all();

        // lấy thông tin tìm kiếm
        $tuKhoa = $res->input('tuKhoa');
        $tTr = $res->input('tkTinhTrang');
        $hThuc = $res->input('tkHinhThucThanhToan');

        // xử lý tìm kiếm
        $donHang = DonHang::where(function ($q) use($tuKhoa)
        {
            $q->orwhere('GhiChu', 'like', '%' . $tuKhoa . '%');
        });

        if (isset($tTr))
        {
            $donHang = $donHang->where('TrangThaiDHId', $tTr)->get();
        }

        if (isset($hThuc))
        {
            $donHang = $donHang->where('HinhThucThanhToan', $hThuc)->get();
        }
        
        // $donHang->dump();
        
        $donHang = $donHang->orderBy('NgayDatHang', 'desc')->paginate(10);
            
        // bổ sung tiêu chí tìm kiếm
        $donHang = $donHang->appends(['tuKhoa'=>$tuKhoa, 'tkTinhTrang'=>$tTr, 'tkHinhThucThanhToan'=>$hThuc]);
// dd($donHang);
        return view('DonHang.DanhSach', ['donHangs'=>$donHang, 'khachHangs'=>$khachHang, 'tuKhoa'=>$tuKhoa, 'tinhTrangDH'=>$tinhTrangDH, 'maTT'=>$tTr, 'hThuc'=>$hThuc]);
    }


    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $donHang = DonHang::find($id);
        dd($donHang);
        // return view('DonHang.sanphamedit', ['donHangs'=>$donHang, 'danhMucs'=>$danhMuc, 'thuongHieus'=>$thuongHieu]);
    }

    // hàm xem chi tiết
    // public function xemTruoc($id)
    // {
    //     $danhMuc = DanhMuc::all();
    //     $thuongHieu = ThuongHieu::all();
    //     $trangThai = TrangThai::all();
    //     $donHang = DonHang::find($id);
    //     return view('DonHang.sanphaminfo', ['donHangs'=>$donHang, 'danhMucs'=>$danhMuc, 'thuongHieus'=>$thuongHieu, 'trangThais'=>$trangThai]);
    // }

    // cập nhật tình trạng đơn hàng, duyệt, ngày duyệt, hoàn thành
    public function capNhat(Request $res, $id)
    {
        // $trangThai = TrangThai::all();
        $donHang = DonHang::find($id);

        if ($res->TrangThaiDHId != $donHang->TrangThaiDHId)
        {
            $donHang->TrangThaiDHId = $res->input('TrangThaiDHId');
        } else {
            $donHang->TrangThaiDHId = $donHang->TrangThaiDHId;
        }

        if ($res->DaDuyet == 0)
        {
            $donHang->DaDuyet = $res->input('DaDuyet');
            $donHang->NgayDuyet = null;
        }
        else
        {
            $donHang->DaDuyet = $res->input('DaDuyet');
            $donHang->NgayDuyet = now();
        }

        if($res->HoanThanh > 0)
        {
            $donHang->HoanThanh = $res->input('HoanThanh');
            $donHang->NgayHoanThanh = now();
        }
        else
        {
            $donHang->HoanThanh = $res->input('HoanThanh');
            $donHang->NgayHoanThanh = null;
        }
        
        $donHang->NgaySua = now();
        $donHang->save();
        
        // return view('sanpham.sanphaminfo', ['thongBao'=>$thongBao, 'sanPhams'=>$sanPham, 'trangThais'=>$trangThai]);
        return redirect()->back()->with('thongBao', 'Cập nhật thành công!');
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $donHang = DonHang::find($id);

        $donHang->TenSanPham = $res->input('TenSanPham');
        $donHang->GiaSanPham = $res->input('GiaSanPham');
        $donHang->GiaKhuyenMai = $res->input('GiaKhuyenMai');
        $donHang->SoLuong = $res->input('SoLuong');
        if ($res->input('SoLuong') == 0) {
            $donHang->TrangThaiId = 2; //hết hàng
        } else {
            $donHang->TrangThaiId = 1; //còn hàng
        }
        $donHang->DonVi = $res->input('DonVi');
        $donHang->DanhMucId = $res->input('DanhMucId');
        $donHang->ThuongHieuId = $res->input('ThuongHieuId');
        $donHang->MoTa = $res->input('MoTa');
        $donHang->NoiDung = $res->input('NoiDung');
        $donHang->NgaySua = now();
        
        $donHang->save();
        
        return redirect('/sanpham/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $donHang = DonHang::find($id);
        $donHang->forceDelete();
        storage::delete('/images/' . $donHang->AnhSanPham);
        return redirect('/sanpham/danhsach');
    }
}
