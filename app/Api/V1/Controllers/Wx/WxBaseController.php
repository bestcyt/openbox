<?php


namespace App\Api\V1\Controllers\Wx;


use App\Http\Controllers\Controller;

class WxBaseController extends Controller
{

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