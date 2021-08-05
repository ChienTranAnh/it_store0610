<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHangChiTiet extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'HoaDonId',
        'SanPhamId',
        'SoLuong',
        'ThanhTien',
    ];

    protected $table = "chitietdonhang";
    public $primaryKey = "Id";
    public $incrementing = true;

    public $timestamps = false;

    // 1 chi tiết đơn hàng chỉ thuộc 1 đơn hàng
    public function DonHang()
    {
        return $this->belongsTo('App\Models\DonHang', 'HoaDonId', 'Id');
    }

    // 1 chi tiết đơn hàng chỉ có 1 sản phẩm
    public function SanPham()
    {
        return $this->hasMany('App\Models\SanPham', 'SanPhamId', 'Id');
    }
}
