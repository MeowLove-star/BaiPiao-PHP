<?php
namespace app\api\model;
use app\lib\exception\ApiException;

class Video extends \think\Model{
    //protected $createTime = 'upVDate';
    public function showNormalList($count,$page){
        $res=$this->where(['videoStatus'=>1])->limit($count)->page($page)->select();
        $res=json_decode(json_encode($res),true);
        return $res;
    }
    public function deleteByID($videoId){
        $res=$this->where('videoId', $videoId)->update(['videoStatus' => 0]);
        $res=json_decode(json_encode($res),true);
        return $res;
    }
    public function videoCreate($data){
        //halt($data);
        $res=$this->allowField(true)->create($data);
        $res=json_decode(json_encode($res),true);
        return $res;
    }
    public function statusChange($videoId){
        $res=$this->where(['videoId'=>$videoId])->find();
        $res=json_decode(json_encode($res),true);
        $videoStatus=($res['videoStatus']==1)? 0:1;
        $data=$this->where(['videoId'=>$videoId])->update(['videoStatus'=>$videoStatus]);
        return $data;
    }
}