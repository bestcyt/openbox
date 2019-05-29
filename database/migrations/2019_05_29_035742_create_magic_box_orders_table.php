<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagicBoxOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magic_box_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('用户id');
            $table->integer('magic_box_id')->comment('魔盒产品id');
            $table->tinyInteger('delivery_status')->comment('发货状态1未发货，2正在筹备，3已发货')->default(1);
            $table->integer('user_address_id')->comment('用户地址id');
            $table->text('note')->comment('订单备注')->nullable();
            $table->tinyInteger('status')->comment('订单状态1取消 2正常')->default(2);
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
        Schema::dropIfExists('magic_box_orders');
    }
}
