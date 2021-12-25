<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\NguoiDung;
use App\Models\VaiTro;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;

class NguoiDungController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach(Request $res)
    {
        $vaiTro = VaiTro::all();
        // $user = NguoiDung::all();

        $tuKhoa = $res->input('tuKhoa');
        $vTro = $res->input('tkVaiTro');

        $user = NguoiDung::where(function ($q) use($tuKhoa)
        {
            $q->orwhere('HoTen', 'like', '%' . $tuKhoa . '%')
            ->orwhere('UserName', 'like', '%' . $tuKhoa . '%')
            ->orwhere('Email', 'like', '%' . $tuKhoa . '%')
            ->orwhere('DienThoai', 'like', '%' . $tuKhoa . '%');
        });

        if (isset($vTro))
        {
            $user = $user->where('VaiTroId', $vTro);
        }

        $user = $user->orderBy('NgayTao', 'desc')->paginate(10);
        
        $user = $user->appends(['tuKhoa'=>$tuKhoa, 'tkVaiTro'=>$vTro]);

        return view('User.DanhSach', ['nguoiDung'=>$user, 'vaiTros'=>$vaiTro, 'tuKhoa'=>$tuKhoa, 'maVT'=>$vTro]);
    }


    // hàm hiển thị form thêm mới
    public function hienThiThemMoi()
    {
        $vaiTro = VaiTro::all();
        return view('User.UserAdd', ['vaiTros'=>$vaiTro]);
    }

    // hàm thực hiện thêm mới
    public function themMoi(Request $res)
    {
        $vaiTro = VaiTro::all();
        $validator = Validator::make($res->all(),
            [
                'UserName'=>'required|min:4|unique:nguoidung,UserName',
                'MatKhau'=>'required|min:6|max:30',
                'HoTen'=>'required|min:5',
                'DienThoai'=>'required|unique:nguoidung,DienThoai',
                'Email'=>'required|unique:nguoidung,Email',
            ],
            [
                'UserName.required'=>'Vui lòng nhập username',
                'UserName.min'=>'Bạn phải nhập username tối thiểu 4 kí tự',
                'UserName.unique'=>'Username đã được đăng ký, bạn vui lòng nhập username khác',
                'MatKhau.required'=>'Bạn phải nhập mật khẩu',
                'MatKhau.min'=>'Mật khẩu tối thiểu 6 kí tự',
                'MatKhau.max'=>'Mật khẩu không được quá 30 kí tự',
                'HoTen.required'=>'Bạn phải nhập đầy đủ họ tên',
                'HoTen.min'=>'Bạn phải nhập họ tên tối thiểu 5 kí tự',
                'DienThoai.required'=>'Bạn phải nhập số điện thoại',
                'DienThoai.unique'=>'Số điện thoại đã được sử dụng',
                'Email.required'=>'Bạn phải nhập email',
                'Email.unique'=>'Email đã được đăng ký, vui lòng nhập email khác'
            ]
        );

        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin!');

        $user = new NguoiDung($res->all());
        if ($validator->fails()) {
            return view('User.UserAdd', ['nguoiDung'=>$user, 'vaiTros'=>$vaiTro])->withErrors($validator);
            // return redirect()->back()->withErrors($validator);
        }
        else
        {
            $user->MatKhau = hash::make($res->input('MatKhau'));
            $user->NgayTao = now();
            $user->save();
            
            return redirect('/nguoidung/danhsach');
        }
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $user = NguoiDung::find($id);
        return view('User.UserEdit', ['nguoiDung'=>$user]);
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $user = NguoiDung::find($id);

        
        $user->save();

        return redirect('/nguoidung/danhsach');
    }

    // cập nhật quyền
    public function capNhat($id, Request $res)
    {
        $user = NguoiDung::find($id);
        // $username = $user->UserName;

        if ($res->VaiTroId != $user->VaiTroId && $res->VaiTroId != "")
        {
            $user->VaiTroId = $res->VaiTroId;
            $user->NgaySua = now();
            $user->save();

            return redirect('/nguoidung/danhsach')->with(['class'=>'alert-success', 'message' => 'Cập nhật vai trò người dùng ' . $user->UserName . ' thành công!']);
        }
        
        elseif ($res->VaiTroId == "")
        {
            return redirect('/nguoidung/danhsach')->with(['class'=>'alert-warning', 'message' => 'Người dùng ' . $user->UserName . ' chưa được cấp vai trò!']);
        }
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $user = NguoiDung::find($id);
        $user->forceDelete();
        return redirect('/nguoidung/danhsach');
    }

    //
    public function getLogin()
    {
        return view('DangNhap');
    }

    // đăng nhập
    public function postLogin(Request $res) {
        // Kiểm tra dữ liệu nhập vào
        $validator = Validator::make($res->all(),
            [
                'UserName' => 'required',
                'MatKhau' => 'required|min:6'
            ],
            [
                'UserName.required' => 'Bạn chưa nhập email',
                'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
                'MatKhau.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            ]
        );

        $username = $res->UserName;
        $pass = $res->MatKhau;
        $user = NguoiDung::where('UserName',$username)->first();
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return view('DangNhap',['user'=>$user])->withErrors($validator);
        } elseif ($user) {

            if (hash::check($pass, $user->MatKhau)) {
                $res->session()->put('user', $user);
                // dd(session('user'));
                return redirect('/');
            } else {
                return redirect()->back();
            }
        } else {
            $res->session()->flash('message', 'Không tồn tại username trên hệ thống!');
            return redirect()->back();
        }
    }

    // đăng xuất
    public function getLogout(Request $res)
    {
        if(session('user')) {
            $res->session()->forget('user');
            return redirect('/dangnhap');
        }
    }
}
