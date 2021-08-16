<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;
use App\Models\ChuDe;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;// khai báo để úp ảnh
// use App\Http\Controllers\Carbon;
use Illuminate\Support\Arr;

class BlogController extends Controller
{
    // hàm lấy toàn bộ thông tin trong dc
    public function danhSach(Request $res)
    {
        $chuDe = ChuDe::all();
        $bloger = NguoiDung::all();

        // lấy thông tin tìm kiếm
        $tuKhoa = $res->input('tuKhoa');
        $cd = $res->input('tkChuDe');

        // xử lý tìm kiếm
        $blog = Blog::where(function ($q) use($tuKhoa)
        {
            $q->orwhere('TieuDe', 'like', '%' . $tuKhoa . '%');
        });

        if (isset($cd))
        {
            $blog = $blog->where('ChuDeId', $cd);
        }

        // lấy 10 thông tin trên 1 trang
        $blog = $blog->orderBy('NgayTao', 'desc')->paginate(10);
        // bổ sung tiêu chí tìm kiếm
        $blog->appends(['tuKhoa'=>$tuKhoa, 'tkChuDe'=>$cd]);

        return view('blog.danhsach', ['blogs'=>$blog, 'bloger'=>$bloger, 'tuKhoa'=>$tuKhoa, 'chuDes'=>$chuDe, 'maCD'=>$cd]);
    }


    // hàm hiển thị form thêm mới
    public function hienThiThemMoi()
    {
        $chuDe = ChuDe::all();

        return view('blog.blogadd', ['chuDes'=>$chuDe]);
    }

    // hàm thực hiện thêm mới
    public function themMoi(Request $res)
    {
        $chuDe = ChuDe::all();

        $validator = Validator::make($res->all(),
            [
                'TieuDe'=>'required|min:15',
                'ChuDeId'=>'required'
            ],
            [
                'TieuDe.required'=>'Bạn phải nhập tiêu đề bài viết',
                'TieuDe.min'=>'Bạn phải nhập tiêu đề bài viết tối thiểu 15 kí tự',
                'ChuDeId.required'=>'Bạn phải nhập chủ đề bài viết',
            ]
        );
        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin');

        $blog = new Blog($res->all());
        
        if ($validator->fails()) {
            return view('blog.blogadd', ['blogs'=>$blog, 'chuDes'=>$chuDe])->withErrors($validator);
        }
        else {
            $blog->NgayTao = now();
            $blog->BloggerId = session('user')->Id;
            $blog->DaDuyet = 0;
            
            $anh = $res->AnhBV;
            if($res->hasFile('AnhBV'))
            {
                $fileName = $anh->getClientOriginalName();
                // $extension = explode(".",$fileName);
                // $format_ex = end($extension);
                $format_ex = $anh->getClientOriginalExtension();// lấy định dạng file
                $allowed_type = array("jpg", "jpeg", "png", "gif");
                if (in_array($format_ex,$allowed_type))
                {
                    $anh->storeAs('blogs', $fileName);
                    $blog->Anh = $fileName;
// dd($blog);
                    $blog->save();
                    return redirect('/blog/danhsach');
                }
                else {
                    $class = 'alert-danger';
                    $thongBao = 'Upload file ảnh không thành công!';
                    return view('blog.blogadd', ['blogs'=>$blog, 'chuDes'=>$chuDe, 'class'=>$class, 'thongBao'=>$thongBao]);
                }
            }
        }
    }

    // hàm hiển thị chi tiết theo mã
    public function chiTiet($id)
    {
        $chuDe = ChuDe::all();
        $blog = Blog::find($id);
        return view('blog.blogedit', ['blogs'=>$blog, 'chuDes'=>$chuDe]);
    }

    // hàm xem chi tiết
    public function xemTruoc($id)
    {
        $chuDe = ChuDe::all();
        $blog = Blog::find($id);
        $bloger = NguoiDung::all();
        return view('blog.bloginfo', ['blogs'=>$blog, 'chuDes'=>$chuDe, 'bloger'=>$bloger]);
    }

    // cập nhật tình trạng sp, duyệt, ngày duyệt
    public function capNhat(Request $res)
    {
        // $trangThai = TrangThai::all();
        $blog_id_arr = json_decode($res->blog_id_arr);
        //$blog_id_arr = Arr::toArray($blog_id_arr);
        //dd($blog_id_arr);

        $blogs = Blog::whereIn('Id', $blog_id_arr)->get();

        foreach($blogs as $blog){
            if (session('user')->Id != $blog->BloggerId)
            {
                // if ($blog->ChuDeId != $res->ChuDeId) {
                //     $blog->ChuDeId = $res->input('ChuDeId');
                // }
                // else {
                //     $blog->ChuDeId = $blog->ChuDeId;
                // }

                // if ($res->DaDuyet > 0)
                // {
                //     $blog->DaDuyet = $res->input('DaDuyet');
                //     $blog->NgayDuyet = now();
                // }
                // else {
                //     $blog->DaDuyet = $res->input('DaDuyet');
                //     $blog->NgayDuyet = null;
                // }
                $blog->DaDuyet = 1;
                
                $blog->NgaySua = now();
                $blog->save();
            
            // return view('blog.bloginfo', ['thongBao'=>$thongBao, 'blogs'=>$blog, 'trangThais'=>$trangThai]);
               // return redirect()->back()->with(['class'=>'alert-success', 'thongBao' => 'Cập nhật thành công!']);
               return response()->json([
                   'message' => 'success'
               ]);
            }
            else {
                //return redirect()->back()->with(['class'=>'alert-danger', 'thongBao' => 'Bạn không được tự duyệt bài của bạn!']);
                return response()->json([
                    'message' => 'Bạn không được tự duyệt bài của bạn!'
                ]);
            }
        }
    }

    // hàm sửa thông tin theo mã
    public function capNhatThongTin(Request $res, $id)
    {
        $chuDe = ChuDe::all();
        $blog = Blog::find($id);

        $blog->TieuDe = $res->input('TieuDe');
        $blog->ChuDeId = $res->input('ChuDeId');
        $blog->MoTa = $res->input('MoTa');
        $blog->NoiDung = $res->input('NoiDung');
        $blog->NgaySua = now();
        $anh = $res->AnhBV;
        if($res->hasFile('AnhBV'))
        {
            $fileName = $anh->getClientOriginalName();
            // $extension = explode(".",$fileName);
            // $format_ex = end($extension);
            $format_ex = $anh->getClientOriginalExtension();// lấy định dạng file
            $allowed_type = array("jpg", "jpeg", "png", "gif");
            if (in_array($format_ex,$allowed_type))
            {
                storage::delete('/blogs/' . $blog->Anh);
                $anh->storeAs('blogs', $fileName);
                $blog->Anh = $fileName;
        
                $blog->save();
                return redirect('/blog/danhsach');
            }
            else {
                $class = 'alert-danger';
                $thongBao = 'Upload file ảnh không thành công!';
                return view('blog.blogedit', ['blogs'=>$blog, 'chuDes'=>$chuDe, 'class'=>$class, 'thongBao'=>$thongBao]);
            }
        }
        
        $blog->save();
        return redirect('/blog/danhsach');
    }

    // hàm xóa trường trong db theo mã
    public function xoa($id)
    {
        $blog = Blog::find($id);
        $blog->forceDelete();
        storage::delete('/blogs/' . $blog->Anh);
        return redirect('/blog/danhsach');
    }
}
