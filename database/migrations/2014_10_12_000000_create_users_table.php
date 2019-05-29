<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('nickname');
            $table->string('avatar');
            $table->tinyInteger('age');
            $table->integer('phone');
            $table->string('email')->unique();
            $table->string('wx_openid')->nullable();
            $table->string('wx_unionid')->nullable();
            $table->string('wx_name')->comment('微信名称');
            $table->integer('qq');
            $table->tinyInteger('gender')->comment('性别：0=女，1=男');
            $table->string('password');
            $table->tinyInteger('level')->comment('用户等级，默认1')->default(1);
            $table->tinyInteger('point')->comment('用户积分')->default(0);
            $table->integer('status')->comment('状态，正常：1000，暂时冻结：1100，永久封号：1200）【新增】')->default(1000);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
