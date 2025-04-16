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
            $table->string('name');
            $table->string('username', 50)->default('')->comment('用户名');
            $table->string('password', 191)->default('')->comment('密码');
            $table->string('avatar',191)->default('')->comment('头像'); // 头像
            $table->string('email',191)->default('')->comment('邮箱');// 不加->unique()
            $table->string('openid', 191)->default('')->comment('openid');
            $table->string('phone', 20)->default('')->comment('手机号');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken(); // 记住密码的标识
            $table->timestamps(); // 创建开始和修改的时间
            $table->softDeletes(); // 软删除的标识
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
