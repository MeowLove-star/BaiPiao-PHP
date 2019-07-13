<?php
namespace app\api\controller\v1;
use app\lib\exception\ApiException;
use app\api\validate\LoginCheck;
use app\api\validate\VideoUploadCheck;
use app\api\validate\VideoDeleteCheck;
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
    public function uploadVideo(){
        //(new VideoUploadCheck)->goCheck();
        $videoUrl=request()->file('videoUrl');
        $videoPic=request()->file('videoPic');   
        if($videoUrl&&$videoPic){
            $videoPicinfo = $videoPic->move(ROOT_PATH . 'public' . DS . 'uploads');
            $videoUrlinfo = $videoUrl->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($videoPicinfo&&$videoUrlinfo){
                return json([
                    'code'=>'200',
                    'msg'=>'success',
                    'videoUrl'=>$videoUrlinfo->getPathname(),
                    'videoPic'=>$videoPicinfo->getPathname(),
                ]);
            }
        }else{
            throw new ApiException('相关上传失败',404,20001);
        }
    }
    public function deleteVideoByvideoId($videoId=''){
        (new VideoDeleteCheck)->goCheck();
        $res=(new modelVideo)->deleteByID($videoId);
        if(!$res){
            throw new ApiException('视频删除失败',201,20002);
        }
        return json([
            'code'=>200,
            'message'=>'success',
        ]);
    }
}
