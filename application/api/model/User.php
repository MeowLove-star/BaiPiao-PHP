<?php
namespace app\api\model;
use app\lib\exception\ApiException;

class User extends \think\Model{
    protected $autoWriteTimestamp = false;
    public function checkLogin($data){
        $res=$this->where(['userName'=>$data['userName']])->find();
        if(!$res){
            throw new ApiException('用户名错误',404,10001);
        }
        if($res['userPassword']==md5($data['userPassword'])){
            $res['userPic']=root_path.$res['userPic'];
            return $res;
        }else{
            throw new ApiException('密码错误',404,10002);
        }
    }
    public function userRegister($data){
        $flag=$this->where(['userName'=>$data['userName']])->find();
        if($flag){
            throw new ApiException('用户名重复,请重新输入',404,10003);
        }
        $data['userPassword']=md5($data['userPassword']);
        $res=$this->allowField(true)->create($data);
        $res=json_decode(json_encode($res),true);
        //halt($res);
        return $res['userId'];
    }
    public function showUserMessage($userId){
        $res=$this->where(['userId'=>$userId])->find();
        $res=json_decode(json_encode($res),true);
        $res['userPic']=root_path.$res['userPic'];
        return $res;
    }
    public function avatarUpload($userId,$userPic){
        $res=$this->where(['userId'=>$userId])->update(['userPic'=>$userPic]);
        $res=json_decode(json_encode($res),true);
        return $res;
    }
}