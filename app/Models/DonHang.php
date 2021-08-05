<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'KhachHangId',
        'TongTien',
        'HinhThucThanhToan',
        'GhiChu',
        'TrangThaiDHId',
    ];

    protected $table = "donhang";
    public $primaryKey = "Id";
    public $incrementing = true;

    public $timestamps = false;

    // 1 đơn hang chỉ có 1 khách hàng
    public function KhachHang()
    {
        return $this->belongsTo('App\Models\KhachHang', 'KhachHangId', 'Id');
    }

    // 1 đơn hàng có nhiều chi tiết đơn hàng
    public function ChiTietDonHang()
    {
        return $this->hasMany('App\Models\DonHangChiTiet', 'HoaDonId', 'Id');
    }

    // 1 đơn hàng chỉ có 1 tình trạng đơn hàng
    public function TinhTrangDonHang()
    {
        return $this->belongTo('App\Models\TinhTrangDonHang', 'TrangThaiDHId', 'Id');
    }
}
