<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LoaiKhachHangController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ThuongHieuController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChuDeController;
use App\Http\Controllers\TrangThaiController;
use App\Http\Controllers\TinhTrangDHController;
use App\Http\Controllers\VaiTroController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\DonHangChiTietController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/index', function () {
    return view('welcome');
});

route::get('/dangnhap', [NguoiDungController::class,'getLogin']);
route::post('/dangnhap', [NguoiDungController::class,'postLogin']);
route::get('/dangxuat', [NguoiDungController::class,'getLogout']);

// giao diện bên ngoài
Route::get('/trangchu', [PageController::class, 'getIndex']);
Route::get('/gioithieu', [PageController::class, 'getAbout']);

Route::get('/sanpham', [PageController::class, 'getProduct']);
Route::get('/sanphamkhuyenmai', [PageController::class, 'get_product_promotion']);
Route::get('/danhmuc/sanpham/{id}', [PageController::class, 'get_product_type']);
Route::get('/thuonghieu/sanpham/{id}', [PageController::class, 'get_product_brand']);
Route::get('/sanphamchitiet/{id}', [PageController::class, 'get_product_detail']);

Route::get('/blog', [PageController::class, 'getBlog']);
Route::get('/blog-detail/{id}', [PageController::class, 'get_blog_detail']);
Route::get('/chude/blog/{id}', [PageController::class, 'get_blog_topic']);

Route::get('/lienhe', [PageController::class, 'getContact']);

Route::get('/add-to-cart/{id}', [PageController::class, 'get_add_to_cart']);
Route::get('/del-from-cart/{id}', [PageController::class, 'get_del_cart']);
Route::get('/del-from-list-cart/{id}', [PageController::class, 'get_del_list_cart']);
Route::get('/update-list-cart/{id}/{quanty}', [PageController::class, 'get_update_list_cart']);
Route::get('/listcart', [PageController::class, 'list_cart']);
Route::get('/checkout', [PageController::class, 'get_view_order']);
route::post('/get-order',[PageController::class, 'get_order']);

// khách hàng
Route::post('/client-login', [KhachHangController::class, 'client_login']);
Route::post('/member-login', [KhachHangController::class, 'member_login']);
Route::get('/member-logout', [KhachHangController::class, 'member_logout']);
Route::get('/register', [KhachHangController::class, 'register_show']);
Route::post('/register', [KhachHangController::class, 'register']);



// phần quản trị
Route::group(['middleware'=>['checkDangNhap']], function() {

    Route::get('/', [PageController::class, 'dashboard']);
    Route::get('/dashboard', [PageController::class, 'dashboard']);

    route::get('/error', function() {
        return view('errorPage');
    });

    // sản phẩm
    route::get('/sanpham/danhsach', [SanPhamController::class, 'danhSach']);
    route::get('/sanpham/chitiet/{id}', [SanPhamController::class, 'xemTruoc']);

    route::get('/danhmuc/danhsach', [DanhMucController::class, 'danhSach']); // danh mục sản phẩm

    route::get('/thuonghieu/danhsach', [ThuongHieuController::class, 'danhSach']);// thương hiệu

    route::get('/donhang/danhsach', [DonHangController::class, 'danhSach']);// đơn hàng

    // chi tiết đơn hàng


    route::get('/tinhtrang/danhsach', [TinhTrangDHController::class, 'danhSach']);// tình trạng đơn hàng

    route::get('/trangthai/danhsach', [TrangThaiController::class, 'danhSach']); // trạng thái

    // khách hàng
    Route::get('/khachhang/danhsach', [KhachHangController::class, 'danhSach']);
    Route::get('/khachhang/chitiet/{id}', [KhachHangController::class, 'chiTiet']);

    route::get('/loaikhang/danhsach', [LoaiKhachHangController::class, 'danhSach']);// loại khách hàng

    route::get('/slide/danhsach', [SlideController::class, 'danhSach']);// slide

    // blog
    route::get('/blog/danhsach', [BlogController::class, 'danhSach']);
    route::get('/blog/them-moi', [BlogController::class, 'hienThiThemMoi']);
    route::post('/blog/them-moi', [BlogController::class, 'themMoi']);
    route::get('/blog/sua/{id}', [BlogController::class, 'chitiet']);
    route::post('/blog/sua/{id}', [BlogController::class, 'capNhatThongTin']);
    route::get('/blog/chitiet/{id}', [BlogController::class, 'xemTruoc']);

    // chủ đề
    route::get('/chude/danhsach', [ChuDeController::class, 'danhSach']);


    // chức năng dành cho người dùng trở lên
    route::group(['middleware'=>['checkUser']], function () {

        route::post('/donhang/chitiet/{id}', [DonHangController::class, 'capNhat']);// đơn hàng
        route::post('/blog/danhsach', [PageController::class, 'test']);// đơn hàng

        // sản phẩm
        route::get('/sanpham/them-moi', [SanPhamController::class, 'hienThiThemMoi']);
        route::post('/sanpham/them-moi', [SanPhamController::class, 'themMoi']);
        route::get('/sanpham/sua/{id}', [SanPhamController::class, 'chiTiet']);
        route::post('/sanpham/sua/{id}', [SanPhamController::class, 'capNhatThongTin']);

        // danh mục sản phẩm
        route::get('/danhmuc/them-moi', [DanhMucController::class, 'hienThiThemMoi']);
        route::post('/danhmuc/them-moi', [DanhMucController::class, 'themMoi']);
        route::get('/danhmuc/sua/{id}', [DanhMucController::class, 'chiTiet']);
        route::post('/danhmuc/sua/{id}', [DanhMucController::class, 'capNhatThongTin']);

        // thương hiệu
        route::get('/thuonghieu/them-moi', [ThuongHieuController::class, 'hienThiThemMoi']);
        route::post('/thuonghieu/them-moi', [ThuongHieuController::class, 'themMoi']);
        route::get('/thuonghieu/sua/{id}', [ThuongHieuController::class, 'chiTiet']);
        route::post('/thuonghieu/sua/{id}', [ThuongHieuController::class, 'capNhatThongTin']);

        // silde
        route::get('/slide/them-moi', [SlideController::class, 'hienThiThemMoi']);
        route::post('/slide/them-moi', [SlideController::class, 'themMoi']);
        route::get('/slide/sua/{id}', [SlideController::class, 'chiTiet']);
        route::post('/slide/sua/{id}', [SlideController::class, 'capNhatThongTin']);
        route::post('/slide/chonanh/{id}', [SlideController::class, 'capNhat']);


        // chức năng dành cho kiểm duyệt viên
        route::group(['middleware'=>['checkChecker']], function() {
        
            route::post('/sanpham/chitiet/{id}', [SanPhamController::class, 'capNhat']);// sản phẩm

            route::post('/blog/chitiet/{id}', [BlogController::class, 'capNhat']);// blog

            // đơn hàng
            route::get('/donhang/sua/{id}', [DonHangController::class, 'chiTiet']);
            route::post('/donhang/sua/{id}', [DonHangController::class, 'capNhatThongTin']);
            route::get('/donhang/xoa/{id}', [DonHangController::class, 'xoa']);

            // tình trạng đơn hàng
            route::get('/tinhtrang/them-moi', [TinhTrangDHController::class, 'hienThiThemMoi']);
            route::post('/tinhtrang/them-moi', [TinhTrangDHController::class, 'themMoi']);
            route::get('/tinhtrang/sua/{id}', [TinhTrangDHController::class, 'chiTiet']);
            route::post('/tinhtrang/sua/{id}', [TinhTrangDHController::class, 'capNhatThongTin']);
            route::get('/tinhtrang/xoa/{id}', [TinhTrangDHController::class, 'xoa']);
        
            // trạng thái
            route::get('/trangthai/them-moi', [TrangThaiController::class, 'hienThiThemMoi']);
            route::post('/trangthai/them-moi', [TrangThaiController::class, 'themMoi']);
            route::get('/trangthai/sua/{id}', [TrangThaiController::class, 'chiTiet']);
            route::post('/trangthai/sua/{id}', [TrangThaiController::class, 'capNhatThongTin']);
            route::get('/trangthai/xoa/{id}', [TrangThaiController::class, 'xoa']);
        
            // chủ đề
            route::get('/chude/them-moi', [ChuDeController::class, 'hienThiThemMoi']);
            route::post('/chude/them-moi', [ChuDeController::class, 'themMoi']);
            route::get('/chude/sua/{id}', [ChuDeController::class, 'chitiet']);
            route::post('/chude/sua/{id}', [ChuDeController::class, 'capNhatThongTin']);


            // chức năng dành cho giám sát viên trở lên
            route::group(['middleware'=>['checkSupervisor']], function() {

                route::get('/sanpham/xoa/{id}', [SanPhamController::class, 'xoa']);// sản phẩm
                route::get('/danhmuc/xoa/{id}', [DanhMucController::class, 'xoa']);// danh mục sản phẩm
                route::get('/thuonghieu/xoa/{id}', [ThuongHieuController::class, 'xoa']);// thương hiệu
                route::get('/blog/xoa/{id}', [BlogController::class, 'xoa']);// blog
                route::get('/chude/xoa/{id}', [ChuDeController::class, 'xoa']);// chủ đề
                route::get('/slide/xoa/{id}', [SlideController::class, 'xoa']);// slide

                // khách hàng
                Route::get('/khachhang/xoa/{id}', [KhachHangController::class, 'xoa']);
                Route::post('/khachhang/sua/{id}', [KhachHangController::class, 'capNhatThongTin']);

                // loại khách hàng
                route::get('/loaikhang/them-moi', [LoaiKhachHangController::class, 'hienThiThemMoi']);
                route::post('/loaikhang/them-moi', [LoaiKhachHangController::class, 'themMoi']);
                route::get('/loaikhang/sua/{id}', [LoaiKhachHangController::class, 'chiTiet']);
                route::post('/loaikhang/sua/{id}', [LoaiKhachHangController::class, 'capNhatThongTin']);
                route::get('/loaikhang/xoa/{id}', [LoaiKhachHangController::class, 'xoa']);

                // người dùng
                route::get('/nguoidung/danhsach', [NguoiDungController::class, 'danhSach']);

                // chức năng chỉ dành cho quản trị viên
                route::group(['middleware'=>['checkAdmin']], function(){

                    // người dùng
                    route::get('/nguoidung/them-moi', [NguoiDungController::class, 'hienThiThemMoi']);
                    route::post('/nguoidung/them-moi', [NguoiDungController::class, 'themMoi']);
                    route::get('/nguoidung/sua/{id}', [NguoiDungController::class, 'chiTiet']);
                    route::post('/nguoidung/sua/{id}', [NguoiDungController::class, 'capNhatThongTin']);
                    route::get('/nguoidung/xoa/{id}', [NguoiDungController::class, 'xoa']);
                    route::post('/nguoidung/vaitro/{id}', [NguoiDungController::class, 'capNhat']);

                    // vai trò
                    route::get('/vaitro/danhsach', [VaiTroController::class, 'danhSach']);
                    route::get('/vaitro/them-moi', [VaiTroController::class, 'hienThiThemMoi']);
                    route::post('/vaitro/them-moi', [VaiTroController::class, 'themMoi']);
                    route::get('/vaitro/sua/{id}', [VaiTroController::class, 'chiTiet']);
                    route::post('/vaitro/sua/{id}', [VaiTroController::class, 'capNhatThongTin']);
                    route::get('/vaitro/xoa/{id}', [VaiTroController::class, 'xoa']);
                });
            });
        });
    });
});