<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinhTrangDonHang extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'TrangThai',
        'MoTa',
    ];

    protected $table = "tinhtrangdonhang";
    public $primaryKey = "Id";
    public $incrementing = true;

    public $timestamps = false;

    // 1 trạng thái có nhiều đơn hàng
    public function DonHang()
    {
        return $this->hasMany('App\Models\DonHang', 'TrangThaiDHId', 'Id');
    }
}
