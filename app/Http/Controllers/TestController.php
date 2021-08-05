<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TestController extends Controller
{
    //
    public function check(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:2'
            ],
            [
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'email ko dung dinh dang',
                'email.unique' => 'email da dc su dung',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải chứa ít nhất 2 ký tự',
            ]
        );

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->back()->with(['flag'=>'success', 'thongBao'=>'Dang nhap thanh cong']);
        } else {
            return redirect()->back()->with(['flag'=>'danger', 'thongBao'=>'Dang nhap that bai']);
        }
    }

    public function dangky(Request $res)
    {
        $this->validate($res,
            [
                'fullname' => 'required|min:5',
                'username' => 'required|min:5|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:2',
                'password_confirmation' => 'required|same:password'
            ],
            [
                'fullname.required' => 'Bạn chưa nhập ho ten',
                'fullname.min' => 'Ho ten toi thuieu la 5 ky tu',
                'username.required' => 'Bạn chưa nhập username',
                'username.min' => 'username toi thieu la 5 ky tu',
                'username.unique' => 'username da dc su dung',
                'email.required' => 'Bạn chưa nhập email',
                'email.email' => 'email ko dung dinh dang',
                'email.unique' => 'email da dc su dung',
                'password.required' => 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu phải chứa ít nhất 2 ký tự',
                'password_confirmation.required' => 'Chua nhap lai mat khau',
                'password_confirmation.same' => 'Mat khau ko giong nhau',
            ]
        );

        $user = new user();
        $user->name = $res->name;
        $user->username = $res->username;
        $user->email = $res->email;
        $user->password = hash::make($res->password);
        $user->save();

        return redirect('/dangnhap');
    }
}
