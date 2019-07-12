<?php
namespace app\admin\model;

class User extends \think\Model{
    public function checkLogin($data){
        $res=$this->where(['userName'=>$data['userName']])->find();       
        return $res;
    }
}