<?php
namespace app\api\validate;
use app\api\validate\BaseValidate;

class LoginCheck extends BaseValidate{
    protected $rule=[
        'userName'=>'require',
        'userPassword'=>'require',
    ];
}
