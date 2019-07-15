<?php
namespace app\api\validate;
use app\api\validate\BaseValidate;

class VideoCreate extends BaseValidate{
    protected $rule=[
        'videoType'=>'require',  
        'videoTitle'=>'require', 
        'videoIntroduction'=>'require',      
        'userId'=>'require',
        //'videoUrl'=>'require',
        //'videoPic'=>'require',
    ];
    protected $message=[
        'videoType.require'=>'视频所属分区不能为空',  
        'videoTitle.require'=>'标题不能为空',
        'videoIntroduction.require'=>'简介不能为空',
        'userId.require'=>'用户id不能为空',
        'videoUrl.require'=>'请上传视频',
        'videoPic.require'=>'视频封面不能为空',
    ];
}
