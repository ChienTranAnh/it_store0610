<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiKhachHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'LoaiKhachHang',
        'MoTa',
    ];

    protected $table = "loaikhachhang";
    public $primaryKey = "Id";
    public $incrementing = false;

    public $timestamps = false;

    // 1 cấp độ kHang có nhiều khách hàng
    public function KhachHang()
    {
        return $this->hasMany('App\Models\KhachHang', 'KhachHangId', 'Id');
    }
}
