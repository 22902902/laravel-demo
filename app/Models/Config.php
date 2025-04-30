<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    // 1.关联的数据表
    public $table = 'config';

    // 2.主键
    public $primaryKey = 'conf_id';

    // 3.允许批量操作的字段
    public $guarded = [];

    // 4.是否维护crated_at 和 updated_at字段
    public $timestamps = true;
}
