<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChuDe extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'TenChuDe',
        'MoTa',
    ];

    protected $table = "chude";
    public $primaryKey = "Id";
    public $incrementing = false;

    public $timestamps = false;

    // 1 chủ đề có nhiều tin tức
    public function Blog()
    {
        return $this->hasMany('App\Models\Blog', 'ChuDeId', 'Id');
    }
}
