<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagicBoxExchangeConditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('magic_box_exchange_conditions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('magic_box_id');
            $table->text('conditions')->comment('富文本');
            $table->tinyInteger('status')->comment('兑换状态1正常使用2关闭');
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
        Schema::dropIfExists('magic_box_exchange_conditions');
    }
}
