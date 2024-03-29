<?php
namespace app\lib\exception;
//use think\Exception;
use think\Request;
use think\Log;
use think\exception\Handle;
class ExceptionHandler extends Handle{
    private $code;
    private $msg;
    private $errorCode;
    public function render(\Exception $e){
        if(config('app_debug')){
            return parent::render($e);
        }   
        if($e instanceof ApiException){
            $this->code=$e->code;
            $this->msg=$e->msg;
            $this->errorCode=$e->errorCode;
        }else{
            $this->code=500;
            $this->msg='an error occured';
            $this->errorCode=999;
            $this->recordErrorLog($e);
        }
        $request=Request::instance();
        $result=[
            'msg'=>$this->msg,
            'errorCode'=>$this->errorCode,
            'request_url'=>$request->url(),
        ];
        return json($result,$this->code);
    }
    private function recordErrorLog(\Exception $e){
        Log::init([
            'type'=>'File',
            'path'=>LOG_PATH,
            'level'=>['error'],
        ]);
        Log::record($e->getMessage(),'error');
    }
}
