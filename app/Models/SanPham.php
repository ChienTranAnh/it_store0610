<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'TenSanPham',
        'MoTa',
        'NoiDung',
        'GiaSanPham',
        'GiaKhuyenMai',
        'SoLuong',
        'DonVi',
        'AnhSanPham',
        'DanhMucId',
        'ThuongHieuId',
        'TrangThaiId',
    ];

    protected $table = "sanpham";
    public $primaryKey = "Id";
    public $incrementing = true;

    public $timestamps = false;

    // 1 sản phẩm chi có 1 danh mục sản phẩm
    public function DanhMuc()
    {
        return $this->belongsTo('App\Models\DanhMuc', 'DanhMucId', 'Id');
    }

    // 1 sản phẩm có trong nhiều chi tiết đơn hàng
    public function ChiTietDonHang()
    {
        return $this->hasMany('App\Models\DonHangChiTiet', 'SanPhamId', 'Id');
    }

    // 1 sản phẩm chỉ thuộc 1 nhà sản xuất
    public function ThuongHieu()
    {
        return $this->belongsTo('App\Models\ThuongHieu', 'ThuongHieuId', 'Id');
    }
}
