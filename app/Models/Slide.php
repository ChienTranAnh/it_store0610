<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'Id',
        'Anh',
        'TieuDe',
        'AnhChon',
    ];

    protected $table = "slide";
    public $primaryKey = "Id";
    public $incrementing = true;

    public $timestamps = false;
}
