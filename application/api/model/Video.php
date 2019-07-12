<?php
namespace app\api\model;
use app\lib\exception\ApiException;

class Video extends \think\Model{
    public function showNormalList(){
        $res=$this->where(['videoStatus'=>1])->paginate(20); halt($res);
        return $res;
    }
}