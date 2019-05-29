<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('type_id')->comment('视频类型');
            $table->integer('user_id');
            $table->string('title');
            $table->string('source')->comment('视频来源')->nullable();
            $table->string('source_url')->comment('视频来源链接')->nullable();
            $table->string('buy_from')->comment('购买链接')->nullable();
            $table->string('description');
            $table->string('tags')->comment('商品标签,横杆-隔开');
            $table->text('use_feel')->comment('用后感')->nullable();
            $table->string('cloud_url')->comment('视频云链接')->nullable();
            $table->string('android_url')->comment('安卓播放链接')->nullable();
            $table->string('ios_url')->comment('苹果播放链接')->nullable();
            $table->tinyInteger('is_from_user')->comment('是否用户上传还是爬虫1上传2爬虫')->default(2);
            $table->tinyInteger('is_hot')->comment('是否热门1热门2否');
            $table->tinyInteger('is_new')->comment('是否新品1新品2否');
            $table->integer('click')->comment('点击量')->default(0);;
            $table->integer('like')->comment('赞数量')->default(0);;
            $table->integer('collect')->comment('收藏数')->default(0);;
            $table->integer('comment')->comment('评论数')->default(0);;
            $table->tinyInteger('is_on')->comment('是否草稿还是上架0草稿1上架')->default(0);
            $table->tinyInteger('status')->comment('审核：-1否1通过2待定');

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
        Schema::dropIfExists('videos');
    }
}
