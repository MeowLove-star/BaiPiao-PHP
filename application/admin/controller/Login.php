<?php
namespace app\admin\controller;
use app\admin\model\User;
use app\admin\validate\LoginCheck;
class Login extends \think\Controller{
    protected $msg='';
    public function login(){
        if(request()->isPost()){
            $data=input('post.');
            $checkError=(new LoginCheck)->goCheck();
            if($checkError){
                //all come in
                return $this->fetch('login',['msg'=>$checkError]);
            }
            $res=(new User)->checkLogin($data);
            if(!$res){
                $this->msg='用户名不存在';
            }
            else{
                if($res['userPassword']!=$data['userPassword']){
                    $this->msg='密码错误';
                }               
            }
            if(empty($this->msg)){
                halt('hi');
                return $this->home();
            }else{
                //halt($this->msg);
                halt('oh');
                return $this->fetch('login',['msg'=>$this->msg]);
            }            
        }else{
            return $this->fetch();
        }       
    }
    public function home()
    {
        return $this->fetch('home');         
    }
}