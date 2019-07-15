<?php
namespace app\api\controller\v1;
use app\lib\exception\ApiException;
use app\api\validate\LoginCheck;
use app\api\model\User;
// 制定允许其他域名访问
header("Access-Control-Allow-Origin:*");
// 响应类型
header('Access-Control-Allow-Methods:POST');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with, content-type');
class Login{
    public function login(){
        if(request()->isPost()){
            (new LoginCheck)->goCheck();
            $data=input('post.');
            $res=(new User)->checkLogin($data);
            //session('UserMessage', $res, 'user');
            return json(['msg'=>'登录成功','code'=>200,'data'=>$res]);
        }else{
            throw new ApiException('请使用post提交表单',404,10000);
        }       
    }
}
