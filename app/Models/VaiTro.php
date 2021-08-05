<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTro extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'VaiTro',
        'MoTa',
    ];

    protected $table = "vaitro";
    public $primaryKey = "Id";
    public $incrementing = false;

    public $timestamps = false;

    // 1 vai trò có nhiều người dùng
    public function NguoiDung()
    {
        return $this->hasMany('App\Models\NguoiDung', 'VaiTroId', 'Id');
    }
}
