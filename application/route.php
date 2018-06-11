<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;
//Route::rule('hello','sample/Test/hello');
//Route::rule('hello','sample/Test/hello','GET|POST',['https'=>false]);
//Route::get('hello/:id','sample/Test/hello');
//Route::get('hello/:id','sample/Test/hello');
//Route::post('hello/:id','sample/Test/hello');

//固定的三段式  模块名/控制器名/操作方法名  有自定义目录用.表示
//api/v1表示这是api接口，v1版本
Route::get('api/:version/banner/:id','api/:version.Banner/getBanner');

//查询通常定义为get
Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
//和上面获取主题的列表的简要信息 做区分，这里传入id信息表示获取某个具体theme的详细信息
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');

Route::get('api/:version/product/recent','api/:version.Product/getRecent');