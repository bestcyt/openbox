<?php


namespace App\Api\V1\Controllers\Wx;


use App\Services\VideoTypesService;

class VideoTypesController extends WxBaseController
{

    protected $videoTypesService;
    public function __construct(VideoTypesService $videoTypesService)
    {
        $this->videoTypesService = $videoTypesService;
    }

    //获取视频分类
    public function index(){
        return $this->ok($this->videoTypesService->index());
    }

}