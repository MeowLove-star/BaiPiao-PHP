<?php
namespace app\api\model;
use app\lib\exception\ApiException;

class Video extends \think\Model{
    protected $createTime = 'upVDate';
    public function showNormalList($count,$page){
        $res=$this->where(['videoStatus'=>1])->limit($count)->page($page)->select();
        $res=json_decode(json_encode($res),true);/halt($res);
        return $res;
    }
    public function deleteByID($videoId){
        $res=$this->where('videoId', $videoId)->update(['videoStatus' => 0]);
        $res=json_decode(json_encode($res),true);
        return $res;
    }
}