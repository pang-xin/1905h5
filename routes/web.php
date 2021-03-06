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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','Index\IndexController@index'); //首页

Route::get('/user/reg','User\UserController@reg'); //注册页面
Route::post('/user/reg_do','User\UserController@reg_do'); //注册
Route::get('/user/login','User\UserController@login'); //登录页面
Route::post('/user/login_do','User\UserController@login_do'); //登录

Route::get('/user/center','User\UserController@center'); //个人中心

Route::get('/goods/getGoods','Goods\GoodsController@getGoods'); //商品
Route::post('/goods/addCart','Goods\GoodsController@addCart'); //添加购物车
Route::get('/goods/getCart','Goods\GoodsController@getCart'); //购物车列表

Route::get('goods/alipay/{total}','Goods\AlipayController@alipay');

Route::get('/test/alipay/return','Goods\PayController@aliReturn');
Route::post('/test/alipay/notify','Goods\PayController@notify');
