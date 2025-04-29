<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config', function (Blueprint $table) {
            $table->id('conf_id')->comment('主键');
            $table->string('conf_title', 50)->comment('标题');
            $table->string('conf_name', 50)->comment('名称');
            $table->text('content')->nullable()->comment('内容');
            $table->integer('conf_order')->default(0)->comment('排序');
            $table->string('conf_tips', 191)->comment('描述');
            $table->string('field_type', 50)->comment('字段类型');
            $table->string('field_value', 191)->comment('类型值');
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
        Schema::dropIfExists('config');
    }
}
