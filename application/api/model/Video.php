<?php
namespace app\api\model;
use app\lib\exception\ApiException;

class Video extends \think\Model{
    protected $createTime = 'upVDate';
    public function showNormalList($count,$page){
        //$res=$this->where(['videoStatus'=>1])->paginate($count); 
        $res=$this->where(['videoStatus'=>1])->limit($count)->page($page)->select();
        $res=json_decode(json_encode($res),true); //halt($res);
        return $res;
    }
}