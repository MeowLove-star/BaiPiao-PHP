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

 Route::post('api/:version/uploadVideo','api/:version.Video/uploadVideo');

 Route::post('api/:version/deleteVideoByvideoId/:videoId','api/:version.Video/deleteVideoByvideoId');
 Route::post('api/:version/deleteVideoByvideoId','api/:version.Video/deleteVideoByvideoId');


