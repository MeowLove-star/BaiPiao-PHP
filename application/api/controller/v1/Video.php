<?php
namespace app\api\controller\v1;
use app\lib\exception\ApiException;
use app\api\validate\LoginCheck;
use app\api\validate\VideoUploadCheck;
use app\api\validate\VideoDeleteCheck;
use app\api\validate\VideoCreate;
use app\api\validate\VideoIdCheck;
use app\api\model\Video as modelVideo;
// 制定允许其他域名访问
header("Access-Control-Allow-Origin:*");
// 响应类型
header('Access-Control-Allow-Methods:POST');
// 响应头设置
header('Access-Control-Allow-Headers:x-requested-with, content-type');
class Video{
    public function getNormalVideoByTypeorName(){
        $type=(input('videoType'))? input('videoType'):'';
        $name=(input('videoTitle'))? input('videoTitle'):'';
        $res=(new modelVideo)->showByChoice($type,$name);
        if(!$res){
            throw new ApiException('相关视频不存在',404,20008);
        }
        return json([
            'code'=>200,
            'message'=>'success',
            'data'=>$res,
        ]);
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
    public function deleteVideoByvideoId($videoId=''){
        (new VideoDeleteCheck)->goCheck();
        $res=(new modelVideo)->deleteByID($videoId);
        if(!$res){
            throw new ApiException('视频删除失败',201,20002);
        }
        return json([
            'code'=>200,
            'message'=>'视频删除成功',
        ]);
    }
    public function statusChange($videoId=''){
        (new VideoIdCheck)->goCheck();
        $res=(new modelVideo)->statusChange($videoId);
        if(!$res){
            throw new ApiException('状态更新失败',201,20003);
        }
        return json([
            'code'=>200,
            'message'=>'状态更新成功',
        ]);
    }
    public function videoSave(){
        if(request()->isPost()){
            //halt(ROOT_PATH);
            (new VideoCreate)->goCheck();
            $data=input('post.');
            $videoUrl=request()->file('videoUrl');
            $videoPic=request()->file('videoPic');
            $videoPicinfo = $videoPic->rule('')->move(ROOT_PATH . 'public' . DS . 'picture','');
            $videoUrlinfo = $videoUrl->rule('')->move(ROOT_PATH . 'public' . DS . 'uploads','');
            //halt($videoUrl->getPathname());
            if(!$videoPicinfo->getPathname()){
                throw new ApiException('视频封面上传失败',201,20005);                 
            }
            if(!$videoUrlinfo->getPathname()){
                throw new ApiException('视频上传失败',201,20006);                 
            }
            //halt($videoPicinfo->getSavename());
            $data['videoPic']='public/picture/'.$videoPicinfo->getSavename();    
            //halt($data['videoPic']);
            $data['videoUrl']='public/uploads/'.$videoUrlinfo->getSavename();
            $res=(new modelVideo)->VideoCreate($data);
            if(!$res){
                throw new ApiException('视频发布失败',201,20007);
            }else{
                return json([
                    'code'=>200,
                    'msg'=>'视频发布成功',
                ]);
            }
        }else{
            throw new ApiException('请使用post提交',201,20004);
        }
        
    }
}
