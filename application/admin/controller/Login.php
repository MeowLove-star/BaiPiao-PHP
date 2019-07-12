<?php
namespace app\admin\controller;
use app\admin\model\User;
class Login extends \think\Controller{
    public function login(){
        if(request()->isPost()){
            $data=input('post.');
            $res=(new User)->checkLogin($data);
        }else{
            return $this->fetch();
        }
        
    }

    public function home()
    {
        return $this->fetch();
        # code...
    }
}