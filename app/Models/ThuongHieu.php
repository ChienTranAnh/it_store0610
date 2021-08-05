<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThuongHieu extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'ThuongHieu',
        'MoTa',
    ];

    protected $table = "thuonghieu";
    public $primaryKey = 'Id';
    public $incrementing = false;

    public $timestamps = false;

    // 1 hãng có nhiều sản phẩm
    public function SanPham()
    {
        return $this->hasMany('App\Models\SanPham', 'ThuongHieuId', 'Id');
    }
}
