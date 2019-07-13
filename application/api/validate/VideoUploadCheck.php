<?php
namespace app\api\validate;
use app\api\validate\BaseValidate;

class VideoUploadCheck extends BaseValidate{
    protected $rule=[
        'videoPic'=>'require',
        'videoUrl'=>'require',
    ];
    protected $message=[
        'videoPic.require'=>'视频封面图片不能为空',
        'videoUrl.require'=>'视频路径不能为空',
    ];
}
