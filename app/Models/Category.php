<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\Slug;

class Category extends Model
{
    use HasFactory, SoftDeletes, Slug;

    public $slugSource = 'name';
    public $slugColumn = 'abb_name';

    protected $fillable = [
        'abb_name',
        'name',
        'description',
    ];
}
