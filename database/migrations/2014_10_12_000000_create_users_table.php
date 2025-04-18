<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique()->comment('登录账号');
            $table->string('password')->comment('密码');
            $table->string('name');
            $table->string('email', 100)->unique()->comment('邮箱');
            $table->string('phone', 20)->nullable()->comment('手机号');
            $table->tinyInteger('status')->default(1)->comment('状态 0=禁用 1=启用');
            $table->boolean('active')->default(true)->comment('激活状态');
            $table->string('token', 100)->nullable()->comment('API访问令牌');
            $table->timestamp('expire_at')->nullable()->comment('令牌过期时间');
            $table->string('avatar',191)->default('')->comment('头像'); // 头像
            $table->string('openid', 191)->default('')->comment('openid');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken()->comment('记住我令牌');// 记住密码的标识
            $table->timestamps();// 创建开始和修改的时间
            $table->softDeletes()->comment('软删除时间');// 软删除的标识
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
