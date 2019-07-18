<?php
namespace app\api\validate;
use think\Exception;
use think\Request;
use app\lib\exception\ApiException;
class BaseValidate extends \think\Validate{
    protected $code=200;
    protected $msg;
    protected $errorCode=777;
    public function goCheck(){
        $data=input(); 
        if(!$this->batch()->check($data)){
            $error=$this->error;    //因为在校验类内部，所以调用错误信息用$this->error,返回的是数组
            //halt($error);
            //要把数组变为字符串，数组只有一个元素，就变为一个string了
            $error = implode(",", $error);
            if($error){
                throw new ApiException($error,$this->code,$this->errorCode);
            }           
            //msg这里如果用$this->msg,就拿不到require的错误信息
        }
        return true;
    }
    // 自定义验证规则 $value,$rule,$data (tp默认传递的参数)
    //$value + 0 ,$value 一般为字符串，加0 可以强制转换成整形变量
    //写道基类，是为了高内聚
    protected function isPostiveInt($value){
        if (is_numeric($value)&&is_int(($value+0))&&($value+0)>0){
            return true;
        }
        $this->code=404;
        $this->msg='id必须为正整数';
        $this->errorCode=10000;
        //return 'id必须为正整数';
        return false;
    }
    protected function isNotEmpty($value){
        if(empty($value)){
            return false;
        }
        return true;
    }
    //验证是否是正确的手机号
    protected function isMobile($value)
    {
        $rule = '/^0?(13|14|15|17|18)[0-9]{9}$/';
        $result = preg_match($rule, $value);
        if ($result) {
            return true;
        } else {
            return false;
        }         
    }
    public function getDataByRule($arrays){
        if(array_key_exists('user_id',$arrays)||array_key_exists('uid',$arrays)){
            throw new ApiException('参数中包含非法的user_id或uid',400,1314);
        }
        $newArray=[];
        foreach($this->rule as $key=>$value){
            $newArray[$key]=$arrays[$key];
        }
        return $newArray;
    }    
}