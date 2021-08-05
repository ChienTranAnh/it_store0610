<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'TieuDe',
        'MoTa',
        'NoiDung',
        'Anh',
        'ChuDeId',
        'BloggerId',
    ];

    protected $table = "tintuc";
    public $primaryKey = "Id";
    public $incrementing = true;

    public $timestamps = false;

    // 1 tin tức thuộc 1 chủ đề
    public function ChuDe()
    {
        return $this->belongsTo('App\Models\ChuDe', 'ChuDeId', 'Id');
    }
}
