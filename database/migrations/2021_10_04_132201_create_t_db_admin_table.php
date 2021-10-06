<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTDbAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_db_admin', function (Blueprint $table) {
            $table->id()->comment('管理员id');
            $table->string('username', 10)->comment('管理员名称')->index('idx_name');
            $table->string('password', 32)->comment('密码');
            $table->tinyInteger('is_enable')->default(1)->comment('是否可用 1可用 0不可用');
            $table->string('creator',10)->comment('创建者');
            $table->timestamp('created_at')->nullable()->comment('创建时间');
            $table->string('modified',10)->nullable()->comment('修改者');
            $table->timestamp('updated_at')->nullable()->comment('更新时间');
        });

        Schema::create('t_db_role', function (Blueprint $table) {
            $table->id()->comment('角色id');
            $table->string('role_name', 10)->comment('角色名称');
            $table->text('auth_id')->comment('权限id,逗号分隔');
            $table->tinyInteger('is_enable')->default(1)->comment('是否可用 1可用 0不可用');
            $table->string('creator',10)->comment('创建者');
            $table->timestamp('created_at')->nullable()->comment('创建时间');
            $table->string('modified',10)->nullable()->comment('修改者');
            $table->timestamp('updated_at')->nullable()->comment('更新时间');
        });

        Schema::create('t_db_auth', function (Blueprint $table) {
            $table->id()->comment('权限id');
            $table->string('auth_name', 10)->comment('权限名称');
            $table->text('auth_id')->comment('权限id');
            $table->tinyInteger('is_enable')->default(1)->comment('是否可用 1可用 0不可用');
            $table->string('creator',10)->comment('创建者');
            $table->timestamp('created_at')->nullable()->comment('创建时间');
            $table->string('modified',10)->nullable()->comment('修改者');
            $table->timestamp('updated_at')->nullable()->comment('更新时间');
        });
        DB::statement("ALTER TABLE `t_db_admin` comment '后台管理员表'");
        DB::statement("ALTER TABLE `t_db_role` comment '角色表'");
        DB::statement("ALTER TABLE `t_db_auth` comment '权限表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_db_admin');
        Schema::dropIfExists('t_db_role');
        Schema::dropIfExists('t_db_auth');
    }
}
