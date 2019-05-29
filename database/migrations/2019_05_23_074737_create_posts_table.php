<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('tags');
            $table->string('description');
            $table->text('content');
            $table->integer('like')->comment('点赞数')->default(0);
            $table->tinyInteger('is_hot')->comment('是否热门1是2不是')->default(2);
            $table->integer('comment')->comment('评论数量');
            $table->tinyInteger('status')->comment('状态：1发布，2草稿，-1删除')->default(2);
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
        Schema::dropIfExists('posts');
    }
}
