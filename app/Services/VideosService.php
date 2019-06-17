<?php


namespace App\Services;


use Illuminate\Support\Facades\DB;

class VideosService
{

    /*
     * 获取视频列表
     * param
     */
    public function index($requestData){
        $where[] = ['status','=',1];
        if (empty($requestData)){
            $where[] = ['is_hot','=',1];
        }

        $list = DB::table('videos')
            ->where($where)
            ->get()
            ;

        return $list;
    }

}