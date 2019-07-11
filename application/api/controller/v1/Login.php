<?php
namespace app\api\controller\v1;
use app\lib\exception\ApiException;
use app\api\validate\LoginCheck;
use app\api\model\User;
class Login{
    public function login(){
        if(request()->isPost()){
            (new LoginCheck)->goCheck();
            $data=input('post.');
            User::checkLogin($data);
        }else{
            throw new ApiException('请使用post提交表单',404,10000);
        }       
    }
}
