<?php

use Dingo\Api\Routing\Router as Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {



    $api->group([ 'namespace' => 'App\Api\V1\Controllers\Wx'],function (Router $api){
        //视频列表，默认热门
        $api->get('/videos', 'VideosController@index');

        //视频分类
        $api->get('/videoTypes', 'VideoTypesController@index');

        //用户中心
        $api->group(['prefix'=>'me'],function (Router $api){
            $api->get('/likes','MeController@likes');//我的喜欢
            $api->get('/collects','MeController@collects');//我的收藏
        });
    });



    $api->get('/', function() {
        return response()->json([
            'message' => 'This im returned by your APIs. Everyone see it.'
        ]);
    });
});
