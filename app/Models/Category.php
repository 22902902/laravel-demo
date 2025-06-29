<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // 可批量赋值的字段
    protected $fillable = [
        'name', 'pid', 'level',
    ];
}
