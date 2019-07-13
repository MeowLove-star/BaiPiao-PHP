<?php
namespace app\api\validate;
use app\api\validate\BaseValidate;

class VideoIdCheck extends BaseValidate{
    protected $rule=[
        'videoId'=>'require|isPostiveInt',       
    ];
    protected $message=[
        'videoId.require'=>'videoId不能为空',    
        'videoId.isPostiveInt'=>'id必须为正整数',    
    ];
}
