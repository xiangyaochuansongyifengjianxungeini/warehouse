<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->comment('执行人用户id');
            $table->string('title', 32)->nullable()->comment('行为名称');
            $table->text('content')->comment('行为内容');
            $table->string('model', 256)->nullable()->comment('行为的关联表格名称或者模型名称（包含命名空间）');
            $table->integer('model_id')->unsigned()->nullable()->comment('行为的关联表格受影响记录ID');
            $table->string('uri', 256)->default('')->comment('执行操作时的当前uri');
            $table->ipAddress('created_ip')->nullable()->comment('执行行为时的IP');
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
        Schema::dropIfExists('action_logs');
    }
}
