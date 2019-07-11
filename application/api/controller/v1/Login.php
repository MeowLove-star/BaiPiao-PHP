<?php
namespace app\api\controller\v1;
use app\lib\exception\ApiException;
class Login{
    public function login(){
        //echo 'hi'; exit;
        throw new ApiException("just a test",404,10001);
    }
}
