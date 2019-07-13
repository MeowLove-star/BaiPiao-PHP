<?php
namespace app\api\controller\v1;
use app\lib\exception\ApiException;
use app\api\validate\LoginCheck;
use app\api\model\Video as modelVideo;
// 制定允许其他域名访问
header("Access-Control-Allow-Origin:*");
// 响应类型
header('Access-Control-Allow-Methods:POST');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with, content-type');
class Video{
    public function getNormalVideoByType(){
        
    }
    //分页
    public function getNormalVideoList(){
        //halt(input('count'));
        $count=(input('count'))? input('count'):20;  
        $page=(input('page'))? input('page'):1;       
        $res=(new modelVideo)->showNormalList($count,$page);
        if(!$res){
            throw new ApiException('相关视频不存在',404,20000);
        }
        return json([
            'msg'=>'success',
            'code'=>200,
            'data'=>$res,
        ]);
    }
}
