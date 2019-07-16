<?php
namespace app\api\model;
use app\lib\exception\ApiException;
error_reporting(0);

class Video extends \think\Model{
    public function showByChoice($type,$name){
        if(!empty($type)){
            $res=$this->where(['videoStatus'=>1,'videoType'=>$type])->select(); 
            $res=json_decode(json_encode($res),true);
            foreach($res as $k=>$v){
                $v['videoUrl']=root_path.$v['videoUrl'];
                $res[$k]['videoUrl']=str_replace("\\","/",$v['videoUrl']);
                $v['videoPic']=root_path.$v['videoPic'];
                $res[$k]['videoPic']=str_replace("\\","/",$v['videoPic']);
            }
            return $res;
        }
        //where('name|title','like','thinkphp%')
        //$sdata['name']=['like','%'.$data['name'].'%'];
        if(!empty($name)){
            $res=$this->where(['videoStatus'=>1])->where('videoTitle','like','%'.$name.'%')->select();
            $res=json_decode(json_encode($res),true);
            foreach($res as $k=>$v){
                $v['videoUrl']=root_path.$v['videoUrl'];
                $res[$k]['videoUrl']=str_replace("\\","/",$v['videoUrl']);
                $v['videoPic']=root_path.$v['videoPic'];
                $res[$k]['videoPic']=str_replace("\\","/",$v['videoPic']);
            }
            return $res;
        }
    }
    public function showNormalList($count,$page){
        $res=$this->where(['videoStatus'=>1])->limit($count)->page($page)->order('videoId desc')->select();
        $res=json_decode(json_encode($res),true);      
        foreach($res as $k=>$v){
            $v['videoUrl']=root_path.$v['videoUrl'];
            $res[$k]['videoUrl']=str_replace("\\","/",$v['videoUrl']);

            $v['videoPic']=root_path.$v['videoPic'];
            $res[$k]['videoPic']=str_replace("\\","/",$v['videoPic']);
        }
        return $res;
    }
    public function deleteByID($videoId){
        $res=$this->where('videoId', $videoId)->update(['videoStatus' => 0]);
        $res=json_decode(json_encode($res),true);
        return $res;
    }
    public function videoCreate($data){
        //halt($data);
        $res=$this->allowField(true)->create($data);
        $res=json_decode(json_encode($res),true);
        return $res;
    }
    public function statusChange($videoId){
        $res=$this->where(['videoId'=>$videoId])->find();
        $res=json_decode(json_encode($res),true);
        $videoStatus=($res['videoStatus']==1)? 0:1;
        $data=$this->where(['videoId'=>$videoId])->update(['videoStatus'=>$videoStatus]);
        return $data;
    }
}