<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('reset_password/{token}', ['as' => 'password.reset', function($token)
{
    // implement your reset password route here!
}]);

Route::get('/', function () {
   echo 'this is web.php';
});

Route::get('/name', function () {
    echo json_encode([
        'code'=>0,
        'msg'=>'this is api luy'
    ]);
});



Route::prefix('back')->group(function (){

    Route::get('/test',function (){
        dd('admin back platform');
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
