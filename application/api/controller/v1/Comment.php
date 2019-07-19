<?php
namespace app\api\controller\v1;
use app\api\validate\CommentCheck;
use app\lib\exception\ApiException;
use app\api\model\Comment as CommentModel;
class Comment{
    public function comment(){
        (new CommentCheck)->goCheck();
        $data=input('post.');
        $commentId=(new CommentModel)->comment($data);
        //halt($commentId);
        if(!$commentId){
            throw new ApiException('评论失败',404,40000);
        }
        $res=(new CommentModel)->getCommentId($commentId);
        return json([
            'code'=>200,
            'message'=>'评论成功',
            'data'=>$res,
        ]);
    }
    public function comments($videoId=''){
        (new CommentCheck)->scene('comment')->goCheck();
        $res=(new CommentModel)->comments($videoId);
        if(!$res){
            throw new ApiException('视频评论获取失败',404,40001);
        }
        return json([
            'code'=>200,
            'message'=>'评论获取成功',
            'data'=>$res,
        ]);
    }
}