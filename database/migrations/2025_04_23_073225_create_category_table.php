<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category', function (Blueprint $table) {
            // 基础字段
            $table->id('cate_id')->comment('主键');
            $table->string('cate_name', 100)->comment('分类名称');
            $table->string('cate_title', 100)->default('')->comment('分类标题');
            $table->string('slug', 100)->unique()->nullable(false)->comment('URL友好名称（唯一）'); // 禁止NULL
            $table->text('description')->nullable()->comment('分类描述（可选）');
            $table->string('image')->nullable()->comment('分类图片（可选）');
            $table->boolean('is_active')->default(true)->comment('是否启用（默认true）');
            $table->integer('order')->default(0)->comment('排序权重');

            // 无限级分类字段
            $table->unsignedBigInteger('parent_id')->nullable()->comment('父级ID（允许NULL）');
            $table->unsignedInteger('_lft')->default(0)->comment('嵌套集合左值');
            $table->unsignedInteger('_rgt')->default(0)->comment('嵌套集合右值');
            $table->unsignedInteger('depth')->default(0)->comment('深度（0为顶级）');

            // 时间戳
            $table->timestamps();

            // 外键约束
            $table->foreign('parent_id')
                ->references('cate_id')
                ->on('category')
                ->onDelete('cascade');
        });

        // 添加索引
        Schema::table('category', function (Blueprint $table) {
            $table->index(['_lft', '_rgt', 'parent_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category');
    }
}
