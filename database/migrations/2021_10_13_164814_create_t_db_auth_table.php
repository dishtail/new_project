<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateTDbAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_db_auth', function (Blueprint $table) {
            $table->id()->comment('权限id');
            $table->string('auth_name',10)->comment('权限名称')->index('idx_auth_name');
            $table->integer('pid', false)->comment('父级菜单id');
            $table->unsignedTinyInteger('auth_rank')->default('1')->comment('菜单级别');
            $table->unsignedTinyInteger('is_menu')->default(1)->comment('是否菜单 1是 0不是');
            $table->string('menu_url', 100)->default('')->comment('菜单url地址');
            $table->string('controller', 30)->comment('控制器名称');
            $table->string('module', 30)->comment('模块名称');
            $table->string('method', 30)->comment('方法名');
            $table->string('auth_sort', 4)->default(0)->comment('排序');
            $table->unsignedTinyInteger('is_enable')->default(1)->comment('是否可用 1可用 0不可用');
            $table->string('creator', 10)->comment('创建者');
            $table->timestamp('created_at')->nullable()->comment('创建时间');
            $table->string('modified', 10)->nullable()->comment('修改者');
            $table->timestamp('updated_at')->nullable()->comment('更新时间');
        });
        DB::statement("ALTER TABLE `t_db_auth` comment '权限表'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_db_auth');
    }
}
