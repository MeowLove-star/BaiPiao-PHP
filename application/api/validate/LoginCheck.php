<?php
namespace app\api\validate;
use app\api\validate\BaseValidate;

class LoginCheck extends BaseValidate{
    protected $rule=[
        'userName'=>'require',
        'userPassword'=>'require',
    ];
    protected $message=[
        'userName.require'=>'用户名不能为空',
        'userPassword.require'=>'密码不能为空',
    ];
}
