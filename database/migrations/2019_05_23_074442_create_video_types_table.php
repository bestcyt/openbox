<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('视频分类名称');
            $table->string('description')->comment('视频分类名称');
            $table->tinyInteger('pid')->comment('父类id');
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
        Schema::dropIfExists('video_types');
    }
}
