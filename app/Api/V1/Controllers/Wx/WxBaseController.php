<?php


namespace App\Api\V1\Controllers\Wx;


use App\Http\Controllers\Controller;

class WxBaseController extends Controller
{

    //判断是否登录
    public function isLogin(){
        return true;
    }

    protected function ok($data = null)
    {
        $res = ['statusCode' => 200];

        if ($data) {
            $res['data'] = $data;
        }

        return response($data);
    }

    protected function  error($msg, $code = 500)
    {
        return response()->json([
            'statusCode' => $code,
            'msg' => $msg
        ]);
    }

}