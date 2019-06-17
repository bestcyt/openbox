<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class VideoTypesService
{

    public function __construct()
    {
    }

    //获取视频分类
    public function index(){

        $typeList = DB::table('video_types')->get();
        return $typeList;
    }
}