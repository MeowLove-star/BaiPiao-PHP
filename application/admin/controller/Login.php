<?php
namespace app\admin\controller;

class Login extends \think\Controller{
    public function login(){
        return $this->fetch();
    }
}