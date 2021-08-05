<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'UserName',
        'MatKhau',
        'HoTen',
        'GioiTinh',
        'DienThoai',
        'Email',
        'DiaChi',
        'VaiTroId',
    ];

    protected $table = "nguoidung";
    public $primaryKey = "Id";
    public $incrementing = true;

    public $timestamps = false;

    // 1 người dùng chỉ có 1 cấp độ
    public function VaiTro()
    {
        return $this->belongsTo('App\Models\VaiTro', 'VaiTroId', 'Id');
    }
}
