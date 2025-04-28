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

    // 格式化分类数据
    public function tree() {
        // 获取所有的分类数据
        $cates = $this->orderBy('order','asc')->get();

        // 格式化（排序、二级分类缩进）
        return $this->getTree($cates);
    }

    public function getTree($category) {// 还得优化
        // 存放最终排完序的分类数据
        $arr = [];
        // 排序，先获取一级类
        foreach($category as $k => $v) {
            // 一级类
            // dump('111'); 6次
            if(empty($v->parent_id) || $v->parent_id == 0) {
                $arr[] = $v;
                // 获取一级类下的二级类
                foreach ($category as $m => $n) {
                    if($v->id == $n->parent_id) {
                        // 给分类名称添加缩进
                        $n->cate_name = '|----' . $n->cate_name;
                        $arr[] = $n;
                    }
                }
            }

        }

        return $arr;
    }

}
