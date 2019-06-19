<?php


namespace App\Api\V1\Controllers\Wx;


use App\Services\MeService;
use Dingo\Api\Http\Request;

class MeController extends WxBaseController
{

    protected $meService;

    public function __construct(MeService $meService)
    {
        if (!$this->isLogin()){
            return $this->error('您还未登录哦');
        }

        $this->meService = $meService;
    }

    /*
     * 我的喜欢
     */
    public function likes(Request $request){

        return $this->ok($this->meService->getMyLikes($request->all()));
    }

    /*
     * 我的收藏
     */
    public function collects(Request $request){
        return $this->ok($this->meService->getMyCollects($request->all()));
    }

    /*
     * 我的足迹
     */
    public function traces(){

    }
}