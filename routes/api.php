<?php

use Dingo\Api\Routing\Router as Router;

/** @var Router $api */
$api = app(Router::class);

$api->version('v1', function (Router $api) {

    $api->get('/', function() {
        return response()->json([
            'message' => 'This is a simple example of item returned by your APIs. Everyone can see it.'
        ]);
    });

    //后台系统api
    $api->group(['prefix'=>'admin' , 'namespace' => 'App\Api\V1\Controllers\Admin'],function (Router $api){
        $api->group(['prefix'=>'video'],function (Router $api){
            $api->post('post',function (\Dingo\Api\Http\Request $request){
                $go = isset($GLOBALS['HTTP_RAW_POST_DATA']) ? $GLOBALS['HTTP_RAW_POST_DATA'] : file_get_contents("php://input");
                return json_encode([
                    'code' => 0,
                    'go' => $go,
                    'request' => $request->input('testImage'),
                    'url'  => 'http://upyun-cyt.b0.upaiyun.com/RF3czXGvAU3FHwgaxN0Cm0QtbX9pWyszRLx8IURm.jpeg'
                ]);
            });
            $api->get('/', 'VideosController@index');
        });
    });

    $api->group(['prefix' => 'auth'], function(Router $api) {
        $api->post('signup', 'App\\Api\\V1\\Controllers\\SignUpController@signUp');
        $api->post('login', 'App\\Api\\V1\\Controllers\\LoginController@login');

        $api->post('recovery', 'App\\Api\\V1\\Controllers\\ForgotPasswordController@sendResetEmail');
        $api->post('reset', 'App\\Api\\V1\\Controllers\\ResetPasswordController@resetPassword');

        $api->post('logout', 'App\\Api\\V1\\Controllers\\LogoutController@logout');
        $api->post('refresh', 'App\\Api\\V1\\Controllers\\RefreshController@refresh');
        $api->get('me', 'App\\Api\\V1\\Controllers\\UserController@me');
    });

    $api->group(['middleware' => 'jwt.auth'], function(Router $api) {
        $api->get('protected', function() {
            return response()->json([
                'message' => 'Access to protected resources granted! You are seeing this text as you provided the token correctly.'
            ]);
        });

        $api->get('refresh', [
            'middleware' => 'jwt.refresh',
            function() {
                return response()->json([
                    'message' => 'By accessing this endpoint, you can refresh your access token at each request. Check out this response headers!'
                ]);
            }
        ]);
    });

    $api->get('hello', function() {
        return response()->json([
            'msg' => 'This is a simple example of item returned by your APIs. Everyone can see it.',
            'code' => 0
        ]);
    });
});
