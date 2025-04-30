<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTable extends Migration
{
    /**
     * 权限表 (permissions)
     * php artisan make:migration create_permissions_table
     *
     * permissions 表补充
     * display_name: 权限显示名称（用于后台展示）
     * parent_id: 权限层级结构
     * sort: 权限排序
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('permission')) {
            Schema::create('permission', function (Blueprint $table) {
                $table->id()->comment('权限ID');
                $table->string('name', 50)->unique()->comment('权限标识');
                $table->string('display_name', 100)->comment('显示名称');
                $table->string('route', 200)->nullable()->comment('路由名称/地址');
                $table->string('guard_name', 30)->default('web')->comment('守卫类型');
                $table->unsignedBigInteger('parent_id')->default(0)->comment('父级权限');
                $table->integer('sort')->default(0)->comment('排序权重');
                $table->timestamps();
                $table->softDeletes()->comment('软删除时间');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission');
    }
}
