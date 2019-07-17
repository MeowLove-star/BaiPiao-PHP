<?php
namespace app\api\controller\v1;
use app\lib\exception\ApiException;
use app\api\validate\LoginCheck;
use app\api\model\User;
error_reporting(0);
// 制定允许其他域名访问
header("Access-Control-Allow-Origin:*");
// 响应类型
header('Access-Control-Allow-Methods:POST');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with, content-type');
class Login{
    public function login(){
        //halt(md5('haha'));
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
    public function register(){
        if(request()->isPost()){
            (new LoginCheck)->goCheck();
            $data=input('post.');
            $userPic=request()->file('userPic');
            if(!empty($userPic)){
                $userPicinfo = $userPic->rule('')->move(ROOT_PATH . 'public' . DS . 'avatar','');
                if(!$userPicinfo->getPathname()){
                    throw new ApiException('头像上传失败',201,20005);                 
                }
                $data['userPic']='public/avatar/'.$userPicinfo->getSavename();
            }
            $userId=(new User)->userRegister($data);
            if(!$userId){
                throw new ApiException('注册失败',404,10001);
            }
            $res=(new User)->showUserMessage($userId);
            return json([
                'code'=>200,
                'message'=>'注册成功',
                'data'=>$res,
            ]);
        }else{
            throw new ApiException('请使用post提交表单',404,10000);
        }       
    }
}
