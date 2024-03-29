<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
// restful 路由列子
// Route::get('api/:version/Category','api/:version.Category/getAllCategory');

//Route::get('api/:version/theme/:id','api/:version.theme/getComplexOne');
//http://localhost/BaiPiao-PHP/public/api/v1/Login   (访问方法)
 Route::post('api/:version/Login','api/:version.Login/login');
 Route::get('api/:version/Login','api/:version.Login/login');

//http://localhost/BaiPiao-PHP/public/api/v1/getNormalVideoList/每页显示条数/页数
 Route::post('api/:version/getNormalVideoList/:count/:page','api/:version.Video/getNormalVideoList');
 Route::post('api/:version/getNormalVideoList','api/:version.Video/getNormalVideoList');

 //Route::post('api/:version/uploadVideo','api/:version.Video/uploadVideo');

 Route::post('api/:version/deleteVideoByvideoId/:videoId','api/:version.Video/deleteVideoByvideoId');
 Route::post('api/:version/deleteVideoByvideoId','api/:version.Video/deleteVideoByvideoId');

 //Route::post('api/:version/video','api/:version.Video/createVideo');

 Route::post('api/:version/status/:videoId','api/:version.Video/statusChange');
 Route::post('api/:version/status','api/:version.Video/statusChange');

 Route::post('api/:version/video','api/:version.Video/videoSave');
 Route::get('api/:version/video','api/:version.Video/videoSave');

    //form 传参：videoType or videoTitle 
 Route::post('api/:version/videos','api/:version.Video/getNormalVideoByTypeorName');

 //注册
 Route::post('api/:version/register','api/:version.Login/register');
 Route::get('api/:version/register','api/:version.Login/register');

 Route::post('api/:version/avatar/:userId','api/:version.Login/avatar');
 Route::post('api/:version/avatar','api/:version.Login/avatar');

 //上传评论
 Route::post('api/:version/comment','api/:version.Comment/comment');
 //返回评论
 Route::post('api/:version/comments/:videoId','api/:version.Comment/comments');
 Route::post('api/:version/comments','api/:version.Comment/comments');



 



