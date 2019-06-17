<?php

use Dingo\Api\Routing\Router as Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {



    $api->group([ 'namespace' => 'App\Api\V1\Controllers\Wx'],function (Router $api){
        //视频列表，默认热门
        $api->get('/videos', 'VideosController@index');
    });



    $api->get('/', function() {
        return response()->json([
            'message' => 'This im returned by your APIs. Everyone see it.'
        ]);
    });
});
