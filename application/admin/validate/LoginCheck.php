<?php
namespace app\admin\validate;

class LoginCheck extends \think\Validate{
    protected $rule=[
        'userName'=>'require',
        'userPassword'=>'require',
    ];
    protected $message=[
        'userName.require'=>'用户名不能为空',
        'userPassword.require'=>'密码不能为空',
    ];
    public function goCheck(){
        $data=input();
        if(!$this->batch()->check($data)){
            $error=$this->error; 
            $error = implode(",", $error);
            if($error){
                return $error;
            }           
        }
        return true;
    }
}
