<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Role extends Authenticatable
{
    use HasFactory;

    // 1.关联的数据表
    public $table = 'roles';

    // 2.主键
    public $primaryKey = 'id';

    // 3.允许批量操作的字段
    public $guarded = [];

    // 4.是否维护crated_at 和 updated_at字段
    public $timestamps = true;

    // 添加动态属性，关联权限模型
    public function permission() {
        // 关联Permission模型，关联表表名，当前模型在关联表中的主键,被关联模型在关联表上的主键
        return $this->belongsToMany('App\Models\Permission','permission_role','role_id','permission_id');
    }
}
