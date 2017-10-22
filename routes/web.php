<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// news 路由
Route::get('/news/insert', 'NewapiController@getNews');

Route::get('/news/list', 'NewsController@list');

Route::get('/news/detail/{id}', 'NewsController@detail');

// 烂笔头
Route::get('/goodwritten', 'GoodwrittenController@index');

Route::get('/goodwritten/query', 'GoodwrittenController@query');


// wechat 路由
Route::any('/wechat', 'WechatController@server');

Route::get('/foo', function () {
    return 'Hello World';
});
