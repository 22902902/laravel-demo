<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Cate extends Model
{
    use HasFactory, NodeTrait;

    // 1.关联的数据表
    public $table = 'category';

    // 2.主键
    public $primaryKey = 'id';

    // 3.允许批量操作的字段
    public $guarded = [];

    // 4.是否维护crated_at 和 updated_at字段
    public $timestamps = true;

    // 自动转换字段类型
    protected $casts = [
        'is_active' => 'boolean'
    ];


}
