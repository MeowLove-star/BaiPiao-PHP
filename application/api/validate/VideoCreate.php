<?php
namespace app\api\validate;
use app\api\validate\BaseValidate;

class VideoCreate extends BaseValidate{
    protected $rule=[
        'videoType'=>'require',  
        'videoTitle'=>'require', 
        'videoIntroduction'=>'require',      
        'userId'=>'require',
    ];
}
