<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\Api\AuthorizationsRequest;
use App\Http\Requests\Api\SocialAuthorizationRequest;
use App\Models\User;

class AuthorizationsController extends Controller {

  public function store(AuthorizationsRequest $request) {
    $user_data['password'] = $request->password;
    if ($name = $request->name) {
      $user_data['name'] = $name;
    } elseif ($phone = $request->phone) {
      $user_data['phone'] = $phone;
    }
    $token = Auth::guard('api')->attempt($user_data) or $this->response->errorUnauthorized('用户名或密码错误');
    return $this->returnToken($token)->setStatusCode(201);
  }
  
  public function socialStore($type,SocialAuthorizationRequest $request){
    if(!in_array($type, ['weixin'])){
      return $this->response->errorBadRequest();
    }
    $driver=\Socialite::driver($type);
    try{
      if($code=$request->code){
        $response=$driver->getAccessTokenResponse($code);
        $token= array_get($response, 'access_token');
      }else{
        $token=$request->access_token;
        if($type=='weixin'){
          $driver->setOpenId($request->openid);
        }
      }
      $oauthUser=$driver->userFromToken($token);
    } catch (Exception $ex) {
      return $this->response->errorUnauthorized('参数错误,不能获取用户信息');
    }
    switch ($type){
      case 'weixin':
        $unionid=$oauthUser->offsetExists('unionid')?$oauthUser->offsetGet('unionid'):null;
        if($unionid){
          $user=User::where('weixin_unionid',$unionid)->first();
        }else{
          $user=User::where('weixin_openid',$oauthUser->getId())->first();
        }
        if(!$user){
          $data=[
              'name'=>$oauthUser->getNickname(),
              'weixin_openid'=>$oauthUser->getId(),
              'weixin_unionid'=>$unionid,
          ];
          $user=User::create($data);
        }
        break;
    }
    $token=Auth::guard('api')->fromUser($user);
    return $this->returnToken($token);
  }

  public function returnToken($token) {
    $data = [
        'access_token' => $token,
        'token_type' => 'Bearer',
        'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
    ];
    
    return $this->response->array($data);
  }

  public function update(AuthorizationsRequest $request) {
    $token = Auth::guard('api')->refresh($request->token);
    return $this->returnToken($token);
  }

  public function delete() {
    Auth::guard('api')->logout();
    return $this->response->noContent();
  }
  
}
