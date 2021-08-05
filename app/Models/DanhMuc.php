<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'DanhMuc',
        'MoTa',
    ];

    protected $table = "danhmuc";
    public $primaryKey = "Id";
    public $incrementing = false;

    public $timestamps = false;

    // 1 danh mục sp có nhiều sản phẩm
    public function SanPham()
    {
        return $this->hasMany('App\Models\SanPham', 'DanhMucId', 'Id');
    }
}
