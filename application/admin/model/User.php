<?php
namespace app\admin\model;

class User extends \think\Model{
    public function checkLogin($data){
        halt($data);
    }
}