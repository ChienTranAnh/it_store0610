<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'UserName',
        'MatKhau',
        'HoTen',
        'GioiTinh',
        'NgaySinh',
        'DienThoai',
        'Email',
        'DiaChi',
        'LoaiKHangId',
    ];

    protected $table = "khachhang";
    public $primaryKey = "Id";
    public $incrementing = true;

    public $timestamps = false;

    // 1 khách hàng có nhiều đơn hàng
    public function DonHang()
    {
        return $this->hasMany('App\Models\DonHang', 'KhachHangId', 'Id');
    }

    // 1 khách hàng chỉ có 1 loại khách hàng
    public function LoaiKhachHang()
    {
        return $this->belongsTo('App\Models\LoaiKhachHang', 'LoaiKHangId', 'Id');
    }
}
