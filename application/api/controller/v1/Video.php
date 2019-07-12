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
    public function getNormalVideoList(){
        //halt(input('count'));
        $count=(input('count'))? input('count'):20;  //halt($count);
        $res=(new modelVideo)->showNormalList($count);
        if(!$res){
            throw new ApiException('相关视频不存在',404,20000);
        }
    }
}
