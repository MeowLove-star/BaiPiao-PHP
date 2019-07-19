<?php
namespace app\api\validate;
use app\api\validate\BaseValidate;

class CommentCheck extends BaseValidate{
    protected $rule=[
        'userId'=>'require|isPostiveInt',
        'videoId'=>'require|isPostiveInt',
        'comment'=>'require',
        //'userEmail'=>'require',
    ];
    protected $message=[
        'userId.require'=>'userId不能为空',
        'userId.isPostiveInt'=>'id必须为正整数',
        'videoId.require'=>'videoId不能为空',
        'videoId.isPostiveInt'=>'id必须为正整数',
        'comment.require'=>'评论不能为空',
        //'userEmail.require'=>'邮箱不能为空',
    ];
    protected $scene=[
        'comment'=>['videoId'],
    ];
}
