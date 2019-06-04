<?php


namespace App\Api\V1\Controllers\Admin;


use App\Services\VideosService;
use Dingo\Api\Contract\Http\Request;

class VideosController
{
    protected $videosService;

    /*
     * 注入业务层
     */
    public function __construct(VideosService $videosService)
    {
        $this->videosService = $videosService;

    }

    /*
     * 获取视频列表
     */
    public function index(){

        return $this->videosService->index();
    }

    /*
     * 上传视频
     */
    public function post(\Illuminate\Http\Request $request){
        $content = file_get_contents('php://input');
        return json_encode([
            'code' => 0,
            '$request' => $request->all(),
            'request' => $request->input('file'),
            '$content' =>$content,
            'url'  => 'http://upyun-cyt.b0.upaiyun.com/RF3czXGvAU3FHwgaxN0Cm0QtbX9pWyszRLx8IURm.jpeg'
        ]);
    }
}