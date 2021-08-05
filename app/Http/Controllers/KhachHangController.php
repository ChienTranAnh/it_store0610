<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use App\Models\KhachHang;
use App\Models\LoaiKhachHang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class KhachHangController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach(Request $res)
    {
        $loaiKH = LoaiKhachHang::all();

        // lấy thông tin tìm kiếm
        $tuKhoa = $res->input('tuKhoa');
        $lkh = $res->input('tkLoaiKhachHang');

        // xử lý tìm kiếm
        $khachHang = KhachHang::where(function ($q) use($tuKhoa)
        {
            $q->orwhere('HoTen', 'like', '%' . $tuKhoa . '%')->orwhere('Email', 'like', '%' . $tuKhoa . '%');
        });

        if (isset($lkh))
        {
            $khachHang = $khachHang->where('LoaiKHId', $lkh);
        }

        // lấy 10 thông tin trên 1 trang
        $khachHang = $khachHang->orderBy('NgayTao', 'desc')->paginate(10);
        // bổ sung tiêu chí tìm kiếm
        $khachHang->appends(['tuKhoa'=>$tuKhoa, 'tkLoaiKhachHang'=>$lkh]);

        return view('khachhang.danhsach', ['khachHangs'=>$khachHang, 'tuKhoa'=>$tuKhoa, 'loaiKHs'=>$loaiKH, 'malkh'=>$lkh]);
    }


    // hàm hiển thị form thêm mới
    public function register_show()
    {
        return view('page.it_register')->with('thongBao','');
    }

    // hàm thực hiện thêm mới
    public function register(Request $res)
    {
        $thongBao="";
        $validator = Validator::make($res->all(),
            [
                'HoTen'=>'required|min:5',
                'GioiTinh'=>'required',
                'DienThoai'=>'required',
                'Email'=>'required',
                'UserName'=>'required|min:5|unique:khachhang,UserName',
                'MatKhau'=>'required|min:6|max:25',
                'MatKhau_return'=>'required|same:MatKhau'
            ],
            [
                'HoTen.required'=>'Bạn phải nhập họ tên',
                'HoTen.min'=>'Bạn phải nhập họ tên tối thiểu 5 kí tự',
                'GioiTinh.required'=>'Bạn phải nhập giới tính',
                'DienThoai.required'=>'Bạn phải nhập số điện thoại',
                'Email.required'=>'Bạn phải nhập địa chỉ email',
                'UserName.required'=>'Bạn phải nhập username',
                'UserName.min'=>'Bạn phải nhập username tối thiểu 5 ký tự',
                'UserName.unique'=>'UserName đã được đăng ký',
                'MatKhau.required'=>'Bạn phải nhập mật khẩu',
                'MatKhau.min'=>'Bạn phải nhập mật khẩu tối thiểu 6 ký tự',
                'MatKhau.max'=>'Bạn phải nhập mật khẩu tối đa 25 ký tự',
                'MatKhau_return.required'=>'Bạn phải nhập trường nhập lại mật khẩu',
                'MatKhau_return.same'=>'Mật khẩu không khớp'
            ]
        );

        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin');

        $khachHang = new KhachHang($res->all());
        
        if ($validator->fails()) {
            return view('page.it_register',['khachHangs'=>$khachHang, 'thongBao'=>$thongBao])->withErrors($validator);
        }
        else
        {
            $khachHang->LoaiKHId = "TV";
            $khachHang->MatKhau = hash::make($res->input('MatKhau'));
            $khachHang->NgayTao = now();
            $khachHang->save();
            Session::forget('message');

            return view('page.it_register')->with('thongBao', 'Đăng ký thành công!');
        }
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $khachHang = KhachHang::find($id);
        return view('khachhang.danhsach', ['khachHangs'=>$khachHang]);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $khachHang = KhachHang::find($id);

        $khachHang->NgaySua = now();

        $khachHang->save();
        
        return redirect('/khachhang/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $khachHang = KhachHang::find($id);
        $khachHang->forceDelete();
        return redirect('/khachhang/danhsach');
    }

    // hàm khách hàng cũ
    public function client_login(Request $res)
    {
        $email = $res->Email;
        $new_cus = KhachHang::where('Email', $email)->first();
        if($new_cus)
        {
            Session::put('thanhVien', $new_cus);
            $class = 'alert-success';
            $thongBao = 'Chào mừng ' . session('thanhVien')->HoTen . ' đã quay lại!';

            return view('page.it_checkout', ['class'=>$class, 'thongBao'=>$thongBao]);
        } else {
            $class = 'alert-danger';
            $thongBao = 'Opps! Không tồn tại email rồi!';
            
            return redirect('checkout', ['new_cus'=>$new_cus, 'class'=>$class, 'thongBao'=>$thongBao]);
        }
    }

    // đăng nhập
    public function member_login(Request $res)
    {
        $username = $res->UserName;
        $pass = $res->MatKhau;

        $khachHang = KhachHang::where('LoaiKHId','TV')->where('UserName',$username)->first();
        if($khachHang){
            if(Hash::check($pass, $khachHang->MatKhau))
            {
                $res->session()->put('thanhVien',$khachHang);
                return redirect()->back();
            } else
            {
                return redirect()->back();
            }
        } else {
            return redirect('/trangchu')->with('thongBao', '<script>alert("Đăng nhập không thành công!")</script>');
        }
    }

    // đăng xuất
    public function member_logout(Request $res)
    {
        if(session('thanhVien')) {
            $res->session()->forget('thanhVien');
            return redirect('/trangchu')->with('thongBao', '<script>alert("Đăng xuất thành công!")</script>');
        }
    }
}
