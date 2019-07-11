<?php
namespace app\lib\exception;
class ApiException extends \think\Exception{
    public $code=400;    //http状态码
    public $msg='请求参数错误';
    public $errorCode=10000;   //内部状态码
    public function __construct($msg='',$code,$errorCode){
        $this->msg=$msg;
        $this->code=$code;
        $this->errorCode=$errorCode;
    }
}