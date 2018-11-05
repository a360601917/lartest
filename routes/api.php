<?php

use Illuminate\Http\Request;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
$api = app('Dingo\Api\Routing\Router');


$api->version('v1', ['namespace' => 'App\Http\Controllers\Api', 'middleware' => ['serializer:array','bindings']], function($api) {

  
  //用户登陆注册
  $api->group(['middleware' => 'api.throttle', 'limit' => 10, 'expires' => 1], function($api) {
    //注删
    $api->post('user', 'User\UserController@store')->name('api.user.store');
    
    //图片难证码
    $api->post('captchas', 'Auth\CaptchasController@store')->name('api.captchas.store');
    //验证码
    $api->post('verifyCode', 'Auth\VerifyCodeController@store')->name('api.verifyCode.store');
    //刷新token
    $api->put('authorizations/update', 'Auth\AuthorizationsController@update')->name('api.authorizations.update');
    //删除token
    $api->delete('authorizations/delete', 'Auth\AuthorizationsController@delete')->name('api.authorizations.delete');
    //登陆
    $api->post('authorizations', 'Auth\AuthorizationsController@store')->name('api.authorizations.store');
    // 第三方登录
    $api->post('socials/{social_type}/authorizations', 'Auth\AuthorizationsController@socialStore')
            ->name('api.socials.authorizations.store');
  });
  
  
  $api->group(['middleware'=>'api.throttle','limit'=>60,'expires'=>1],function($api){
    //无须登陆
    //商品
    $api->get('goods','Goods\GoodsController@index')->name('goods.index');
    $api->get('goods/{goods}','Goods/GoodsController@show')->name('goods.show');
    //$api->resource('goods','GoodsController',['only'=>['index','show']]);
    //分类
    $api->get('category','Category\CategoryController@index')->name('category.index');
    $api->get('category/{category}','Category\CategoryController@show')->name('category.show');
    //广告
    $api->get('advertising','Advertising\AdvertisingController@index')->name('advertising.index');
    $api->get('advertising/{advertising}','Advertising\AdvertisingController@show')->name('advertising.show');

    
    
    //须登陆
    $api->group(['middleware'=>'api.auth'],function($api){
      //购物车
      $api->resource('cart','CartController');
      //下单
      $api->resource('orders','OrderController');
    });
    
  });
  

  
  
});
