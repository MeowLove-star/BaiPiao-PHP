<?php
namespace app\admin\controller;
use app\admin\model\User;
class Login extends \think\Controller{
    public function login(){
        $msg='';
        $code='';
        if(request()->isPost()){
            $data=input('post.');
        }else{
            return $this->fetch();
        }
        
    }
    public function home(){
        return $this->fetch();
    }
    public function home()
    {
        return $this->fetch();
        # code...
    }
}