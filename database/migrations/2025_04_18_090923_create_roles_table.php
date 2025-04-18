<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * 角色表 (roles)
     * php artisan make:migration create_roles_table
     *
     * roles 表补充
     * guard_name: 兼容多认证系统（web/api）
     * description: 角色描述
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id()->comment('角色ID');
            $table->string('name', 50)->unique()->comment('角色名称');
            $table->string('description', 200)->nullable()->comment('角色描述');
            $table->string('guard_name', 30)->default('web')->comment('守卫类型');
            $table->timestamps();
            $table->softDeletes()->comment('软删除时间');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
