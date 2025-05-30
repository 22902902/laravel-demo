<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 接口用的分类
 *
 * php artisan make:model Category -m
 *
 * 执行迁移：php artisan migrate
 *
 */
class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('分类名称');
            $table->integer('pid')->default(0)->comment('父级');
            $table->tinyInteger('status')->default(1)->comment('状态: 0禁用 1启用');
            $table->tinyInteger('level')->default(1)->comment('分类级别1、2、3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
