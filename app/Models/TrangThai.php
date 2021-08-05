<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrangThai extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'TrangThai',
        'MoTa',
    ];

    protected $table = "trangthai";
    public $primaryKey = "Id";
    public $incrementing = true;

    public $timestamps = false;

    // 1 trạng thái có nhiều sản phẩm
    public function SanPham()
    {
        return $this->hasMany('App\Models\SanPham', 'TrangThaiId', 'Id');
    }

    // 1 trạng thái có nhiều đơn hàng
    public function DonHang()
    {
        return $this->hasMany('App\Models\DonHang', 'TrangThaiId', 'Id');
    }

    // 1 trạng thái có nhiều tin tức
    public function TinTuc()
    {
        return $this->hasMany('App\Models\TinTuc', 'TrangThaiId', 'Id');
    }
}
