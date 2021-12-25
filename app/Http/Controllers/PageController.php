<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use App\Models\Slide;
use App\Models\SanPham;
use App\Models\DanhMuc;
use App\Models\ThuongHieu;
use App\Models\TrangThai;
use App\Models\Cart;
use App\Models\KhachHang;
use App\Models\DonHang;
use App\Models\DonHangChiTiet;
use App\Models\Blog;
use App\Models\ChuDe;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    // trang chủ
    public function getIndex()
    {
        $slide = Slide::where('AnhChon',1)->get();
        $slide = $slide->sortByDesc('Id');
        $sanPham = SanPham::where('DaDuyet',1)->get()->take(8);
        $sPham = SanPham::where('GiaKhuyenMai', '<>', 0)->where('DaDuyet',1)->get()->take(4);
        
        $collection = SanPham::where('DaDuyet',1)->where('TrangThaiId','<>',2)->get();
        // $collection = collect(SanPham::where('DaDuyet',1)->where('TrangThaiId','<>',2)->get());
        $new_sp = $collection->sortByDesc('NgaySua')->take(4);
        
        $collection = Blog::where('DaDuyet',1)->get();
        // $collection = collect(Blog::where('DaDuyet',1)->get());
        $blog = $collection->sortByDesc('NgaySua')->take(3);
// dd($blog);
        return view('Page.it_home', ['slide'=>$slide, 'sanPham'=>$sanPham, 'sPham'=>$sPham, 'new_sp'=>$new_sp, 'blog'=>$blog]);
    }


    // giới thiệu
    public function getAbout()
    {
        return view('Page.it_error');
    }


    // hàm tìm kiếm + lấy danh sách sản phẩm
    public function getProduct(Request $res)
    {
        $tuKhoa = $res->tuKhoa;
        $sanPham = SanPham::where(function ($q) use($tuKhoa)
        {
            $q->orwhere('TenSanPham', 'like', '%' . $tuKhoa . '%')->orwhere('AnhSanPham', 'like', '%' . $tuKhoa . '%');
        })->where('DaDuyet',1);
        
        $sanPham = $sanPham->paginate(9);

        return view('Page.it_shop', ['sanPham'=>$sanPham]);
    }

    // hàm lọc sản phẩm đang khuyến mại
    public function get_product_promotion()
    {
        $sanPham = SanPham::where('GiaKhuyenMai', '<>', 0)->where('DaDuyet', 1)->paginate(9);
        return view('Page.it_shop', ['sanPham'=>$sanPham]);
    }

    // hàm lọc sản phẩm theo danh mục
    public function get_product_type($id)
    {
        $sanPham = SanPham::where('DanhMucId', $id)->where('DaDuyet', 1)->paginate(9);
        return view('Page.it_shop', ['sanPham'=>$sanPham]);
    }

    // hàm lọc sản phẩm theo thương hiệu
    public function get_product_brand($id)
    {
        $sanPham = SanPham::where('ThuongHieuId', $id)->where('DaDuyet', 1)->paginate(9);
        return view('Page.it_shop', ['sanPham'=>$sanPham]);
    }

    // hàm lấy thông tin chi tiết 1 sản phẩm và các sản phẩm cùng thương hiệu + danh mục
    public function get_product_detail($id, Request $res)
    {
        $trangThai = TrangThai::all();
        $sanPham = SanPham::find($id);

        $res = $sanPham->ThuongHieuId;
        $sp = sanpham::where('ThuongHieuId',$res)->where('DaDuyet', 1)->take(3)->get();
        // dd($sp);
        
        $res = $sanPham->DanhMucId;
        $sps = sanpham::where('DanhMucId',$res)->where('DaDuyet', 1)->take(3)->get();

        return view('Page.it_shop_detail', ['sp'=>$sp, 'sps'=>$sps, 'sanPham'=>$sanPham, 'trangThai'=>$trangThai]);
    }


    // hàm view đến trang liên hệ
    public function getContact()
    {
        return view('Page.it_contact');
    }


    // hàm danh sách bài viết
    public function getBlog(Request $res)
    {
        $bloger = NguoiDung::all();
        
        $tuKhoa = $res->tuKhoa;
        $blog = Blog::where(function ($q) use($tuKhoa)
        {
            $q->orwhere('TieuDe', 'like', '%' . $tuKhoa . '%');
        })->where('DaDuyet',1);
        $blog = $blog->paginate(3);

        return view('Page.it_blog', ['blog'=>$blog, 'bloger'=>$bloger, 'tuKhoa'=>$tuKhoa]);
    }

    // hàm chi tiết bài viết
    public function get_blog_detail($id)
    {
        $bloger = NguoiDung::all();
        $blog = Blog::find($id);
        $blog->LuotXem++;
        $blog->save();

        return view('Page.it_blog_detail', ['blog'=>$blog, 'bloger'=>$bloger]);
    }

    // hàm hiển thị blog theo chủ đề
    public function get_blog_topic($id)
    {
        $bloger = NguoiDung::where('VaiTroId',"VIEWER")->get();
        $blog = Blog::where('ChuDeId',$id)->where('DaDuyet', 1)->paginate(3);

        return view('Page.it_blog', ['blog'=>$blog, 'bloger'=>$bloger]);
    }


    // hàm thêm sp vào giỏ hàng
    public function get_add_to_cart($id, Request $res)
    {
        $product = SanPham::find($id);
        
        if ($product != null)
        {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($product, $id);
            
            $res->session()->put('Cart', $newCart);
        }

        return view('Page.cart.cart_cache');
    }

    // hàm xóa sp trong giỏ hàng
    public function get_del_cart($id)
    {
        $oldCart = Session::has('Cart') ? Session::get('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->delCart($id);

        if (count($newCart->products) >= 0) {
            Session::put('Cart', $newCart);
        } else {
            Session::forget('Cart');
        }

        return view('Page.cart.cart_cache');
    }

    // hàm xóa sp trong list cart
    public function get_del_list_cart($id)
    {
        $oldCart = Session::has('Cart') ? Session::get('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->delCart($id);

        if (count($newCart->products) > 0) {
            Session::put('Cart', $newCart);
        } else {
            Session::forget('Cart');
        }

        return view('Page.cart.list_cart');
    }

    // hàm cập nhật danh sách giỏ hàng
    public function get_update_list_cart($id, Request $res, $quanty)
    {
        $oldCart = Session::has('Cart') ? Session::get('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->updateItemCart($id, $quanty);
        
        Session::put('Cart', $newCart);
        
        return view('Page.cart.list_cart');
    }

    // hàm hiển thị giỏ hàng
    public function list_cart()
    {
        $trangThai = TrangThai::all();
        return view('Page.it_cart',['trangThai'=>$trangThai]);
    }

    // hàm hiển thị đặt hàng
    public function get_view_order()
    {
        $new_cus="";
        return view('Page.it_checkout', ['new_cus'=>$new_cus]);
    }

    // hàm đặt hàng
    public function get_order(Request $res)
    {
        $cart = session('Cart');

        $thongBao="";
        $validator = Validator::make($res->all(),
            [
                'HoTen'=>'required|min:5',
                'GioiTinh'=>'required',
                'DienThoai'=>'required',
                'Email'=>'required',
                'DiaChi'=>'required',
            ],
            [
                'HoTen.required'=>'Bạn phải nhập họ tên',
                'HoTen.min'=>'Bạn phải nhập họ tên tối thiểu 5 kí tự',
                'GioiTinh.required'=>'Bạn phải nhập giới tính của bạn',
                'DienThoai.required'=>'Bạn phải nhập số điện thoại',
                'Email.required'=>'Bạn phải nhập địa chỉ email',
                'DiaChi.required'=>'Bạn phải nhập địa chỉ giao hàng',
            ]
        );

        $res->session()->flash('message', 'Bạn cần phải nhập đầy đủ thông tin');

        $new_cus = new KhachHang($res->all());
        
        if ($validator->fails()) {
            return view('Page.it_checkout',['new_cus'=>$new_cus])->withErrors($validator);
        }
        else
        {
            if ($res->Email)
            {
                $cus = KhachHang::where('Email', $res->Email)->first();
                if ($cus)
                {
                    $bill = new DonHang();
                    $bill->KhachHangId = $cus->Id;
                    $bill->TongTien = $cart->totalPrice;
                    $bill->SoLuong = $cart->totalQuanty;
                    $bill->HinhThucThanhToan = $res->HinhThucThanhToan;
                    $bill->GhiChu = $res->GhiChu;
                    $bill->NgayDatHang = now();
                    $bill->TrangThaiDHId = 2;
                    $bill->DaDuyet = 0;
                    $bill->HoanThanh = 0;
                    $bill->save();
                } else {
                    // $new_cus = new KhachHang($res->all());
                    $new_cus->LoaiKHId = "CLIENT";
                    $new_cus->NgayTao = now();
                    $new_cus->save();

                    $bill = new DonHang();
                    $bill->KhachHangId = $new_cus->Id;
                    $bill->NgayDatHang = now();
                    $bill->TongTien = $cart->totalPrice;
                    $bill->SoLuong = $cart->totalQuanty;
                    $bill->HinhThucThanhToan = $res->HinhThucThanhToan;
                    $bill->GhiChu = $res->GhiChu;
                    $bill->TrangThaiDHId = 2;
                    $bill->DaDuyet = 0;
                    $bill->HoanThanh = 0;
                    $bill->save();
                }

                foreach ($cart->products as $key => $vl)
                {
                    $bill_detail = new DonHangChiTiet();
                    $product_detail = SanPham::find($key);
                    $bill_detail->HoaDonId = $bill->Id;
                    $bill_detail->SanPhamId = $key;
                    $bill_detail->SoLuong = $vl['quanty'];
                    $product_detail->SoLuong -= $vl['quanty'];
                    $product_detail->NgaySua = now();
                    $product_detail->DaBan += $vl['quanty'];
                    $bill_detail->ThanhTien = $vl['price'];
                    $bill_detail->NgayTao = now();
                    $bill_detail->save();
                    $product_detail->save();
                }

                Session::forget('message');
                Session::forget('Cart');
                $class = 'alert-success';
                $thongBao = 'Đặt hàng thành công!';
                return view('Page.it_checkout', ['class'=>$class, 'thongBao'=>$thongBao]);
            }
        }
    }


    // dashboard
    public function dashboard()
    {
        // tách chỉ lấy ngày trong lệnh ngày giờ now()
        $datetime = explode(" ",date(now()));
        $date = $datetime[0];

        $user = NguoiDung::all();
        $danhMuc = DanhMuc::all();
        $thuongHieu = ThuongHieu::all();
        $chuDe = ChuDe::all();
        
        // $khachHang = KhachHang::where('NgayTao','like', '%' . $date . '%')->get();
        // $donHang = DonHang::where('NgayDatHang','like', '%' . $date . '%')->get();
        // $sanPham = SanPham::where('NgayTao','like', '%' . $date . '%')->get();
        // $blog = Blog::where('NgayTao','like', '%' . $date . '%')->get();

        // dd($date);

        $khachHang = KhachHang::all();
        // $khachHang = KhachHang::select('*')->orderBy('NgayTao', 'desc')->get();
        $donHang = DonHang::where('NgayDatHang', 'like', '%' . '2021-07-15' . '%')->get();
        $sanPham = SanPham::where('NgayTao','like', '%' . '2021-07-15' . '%')->get();
        $blog = Blog::where('NgayTao', 'like', '%' . '2021-07-19' . '%')->get();

        $khachHang = $khachHang->sortByDesc('NgayTao');
        $donHang = $donHang->sortByDesc('NgayTao');
        $sanPham = $sanPham->sortByDesc('NgayTao');
        $blog = $blog->sortByDesc('NgayTao');

        return view('Dashboard', ['khachHang'=>$khachHang, 'donHang'=>$donHang, 'sanPham'=>$sanPham, 'danhMuc'=>$danhMuc, 'thuongHieu'=>$thuongHieu, 'blog'=>$blog, 'chuDe'=>$chuDe, 'user'=>$user]);
    }

    public function test()
    {
        return redirect('/trangchu')->with(['class'=>'alert-danger', 'thongBao'=>'Ô tô kê']);
    }
}