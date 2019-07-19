<?php
namespace app\api\model;

class Comment extends \think\Model{
    protected $autoWriteTimestamp = false;

    // public function headImage(){
    //     return $this->belongsTo('image','head_img_id','id');
    // }
    public function userMessage(){
        return $this->belongsTo('user','userId','userId');
    }    
    public function videoMessage(){
        return $this->belongsTo('video','videoId','videoId');
    }  
    public function comment($data){
        $data['commentDate']=time();
        $res=$this->allowField('true')->create($data);
        //$res=self::with(['userMessage']);       
        $res=json_decode(json_encode($res),true);
        return $res['commentId'];
    }
    public function comments($videoId=''){
        $res=$this->where(['videoId'=>$videoId])->order('commentId desc')->select();
        $res=json_decode(json_encode($res),true);
        return $res;
    }
    public function getCommentId($id){
        $res=self::with(['userMessage','videoMessage'])->find($id);
        $res=json_decode(json_encode($res),true);
        $res['user_message']['userPic']=root_path.$res['user_message']['userPic'];
        $res['video_message']['videoUrl']=root_path.$res['video_message']['videoUrl'];
        $res['video_message']['videoPic']=root_path.$res['video_message']['videoPic'];
        //halt($res);
        return $res;
    }
}