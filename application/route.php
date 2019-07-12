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

//http://localhost/BaiPiao-PHP/public/api/v1/getNormalVideoList/6
 Route::post('api/:version/getNormalVideoList/:count','api/:version.Video/getNormalVideoList');
 Route::post('api/:version/getNormalVideoList','api/:version.Video/getNormalVideoList');


