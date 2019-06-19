<?php


namespace App\Services;


use App\Models\UserCollects;
use App\Models\UserLikes;

class MeService
{
//    use Jwt;

    protected $userId;

    public function __construct()
    {
        $this->userId = 1;

    }

    //我的喜欢
    public function getMyLikes($requestData){
        $limit = $requestData['limit'] ?? 10;
        if ($requestData['type'] == 'videos'){
            //获取喜欢的视频
            $data = UserLikes::with('videos')
                ->where([
                    ['user_id','=',$this->userId],
                    ['type','=',1]
                ])
                ->orderBy('created_at','desc')
                ->paginate($limit);
        }else{
            //获取喜欢的帖子
            $data = UserLikes::with('posts')
                ->where([
                    ['user_id','=',$this->userId],
                    ['type','=',2]
                ])
                ->orderBy('created_at','desc')
                ->paginate($limit);
        }

        return $data;
    }

    //我的收藏 @todo 分页要改
    public function getMyCollects($requestData){
        $limit = $requestData['limit'] ?? 10;
        if ($requestData['type'] == 'videos'){
            //获取收藏的视频
            $data = UserCollects::with('videos')
                ->where([
                    ['user_id','=',$this->userId],
                    ['type','=',1]
                ])
                ->orderBy('created_at','desc')
                ->paginate($limit);
        }else{
            //获取收藏的帖子
            $data = UserCollects::with('posts')
                ->where([
                    ['user_id','=',$this->userId],
                    ['type','=',2]
                ])
                ->orderBy('created_at','desc')
                ->paginate($limit);
        }

        return $data;
    }


    //我的足迹
    public function getMyTraces(){
        return 1;
    }


}