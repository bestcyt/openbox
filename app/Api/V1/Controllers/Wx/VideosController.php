<?php


namespace App\Api\V1\Controllers\Wx;


use App\Services\VideosService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideosController extends WxBaseController
{
    /*
     * @todo wx的视频
     */

    protected $videosService;

    public function __construct(VideosService $videosService)
    {
        $this->videosService = $videosService;
    }

    /*
     * 获取视频列表
     */
    public function index(Request $request){
        $requestData = $request->all();
        return $this->ok($this->videosService->index($requestData));
    }

}