<?php
namespace app\api\validate;
use app\api\validate\BaseValidate;

class UserIdCheck extends BaseValidate{
    protected $rule=[
        'userId'=>'require|isPostiveInt',       
    ];
    protected $message=[
        'userId.require'=>'userId不能为空',    
        'userId.isPostiveInt'=>'userId必须为正整数',    
    ];
}
