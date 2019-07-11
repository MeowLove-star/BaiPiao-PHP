<?php
namespace app\api\model;
use app\lib\exception\ApiException;

class User extends \think\Model{
    public function checkLogin($data){
        $res=$this->where(['userName'=>$data['userName']])->find();
        if(!$res){
            throw new ApiException('用户名错误',404,10001);
        }
        if($res['userPassword']==$data['userPassword']){
            return $res;
        }else{
            throw new ApiException('密码错误',404,10002);
        }
    }
}