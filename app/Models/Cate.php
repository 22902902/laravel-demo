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
    public $primaryKey = 'cate_id';

    // 3.允许批量操作的字段
    public $guarded = [];

    // 4.是否维护crated_at 和 updated_at字段
    public $timestamps = true;

    // 自动转换字段类型
    protected $casts = [
        'is_active' => 'boolean'
    ];

    // 生成slug
    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            // 确保slug不为空且唯一
            $category->slug = $category->slug ?: \Str::slug($category->cate_name);
            $category->slug = \Str::slug($category->cate_name); // 强制重新生成
        });

        static::updating(function ($category) {
            if ($category->isDirty('cate_name')) {
                $category->slug = \Str::slug($category->cate_name);
            }
        });
    }
}
