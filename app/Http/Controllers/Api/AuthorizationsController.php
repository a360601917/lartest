<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\Api\AuthorizationsRequest;

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

  public function returnToken($token) {
    $data = [
        'access_token' => $token,
        'token_type' => 'Bearer',
        'expires_in' => Auth::guard('api')->factory()->getTTL() * 60
    ];
    
    return $this->response->array($data);
  }

  public function update() {
    $token = Auth::guard('api')->refresh();
    return $this->returnToken($token);
  }

  public function delete() {
    Auth::guard('api')->logout();
    return $this->response->noContent();
  }

}
