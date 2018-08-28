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

$api->version('v1', ['namespace' => 'App\Http\Controllers\Api', 'middleware' => 'serializer:array'], function($api) {

  $api->group(['middleware' => 'api.throttle', 'limit' => 10, 'expires' => 1], function($api) {
    //验证码
    $api->post('verifyCode', 'VerifyCodeController@store')->name('api.verifyCode.store');
    //注删
    $api->post('user', 'UserController@store')->name('api.user.store');
    //刷新token
    $api->put('authorizations/update','AuthorizationsController@update')->name('api.authorizations.update');
    //删除token
    $api->delete('authorizations/delete','AuthorizationsController@delete')->name('api.authorizations.delete');
  });
  
});
