<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('video_id')->comment('视频id')->nullable();
            $table->integer('post_id')->comment('帖子id')->nullable();
            $table->integer('pid')->comment('是否顶级评论0顶级');
            $table->integer('user_id')->comment('用户评论id');
            $table->integer('to_reply_id')->comment('被评论用户id');
            $table->tinyInteger('type')->comment('类型，1视频评论 2帖子评论');
            $table->text('content')->comment('评论内容');
            $table->integer('like')->comment('点赞数量')->default(0);
            $table->tinyInteger('status')->comment('状态是否展示 1可以 2不行')->default(1);
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
        Schema::dropIfExists('comments');
    }
}
