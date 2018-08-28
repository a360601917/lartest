<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use App\Transformers\UserTransformer;


class UserController extends Controller {

  public function store(UserRequest $request) {
    $data['password'] = bcrypt($request->password);

    if ($phone = $request->phone) {
      $key = $request->key;
      $verify_code = $request->verify_code;
      $verify_data = Cache::get($key) or $this->response->error('验证码失效', 422);
      ($verify_code==$verify_data['verify_code']) or $this->response->errorUnauthorized('验证码不正确');
      Cache::forget($key);
      $data['phone'] = $phone;
      $data['name']=$request->name?:$phone;
    } elseif ($name = $request->name) {
      $data['name'] = $name;
    } elseif ($email = $request->email) {
      $data['email'] = $email;
    }

    $user = User::create($data);
    $mate=[
        'access_token'=>\Auth::guard('api')->fromUser($user),
        'token_type'=>'Bearer',
        'expires_in'=>\Auth::guard('api')->factory()->getTTL() * 60
    ];

    return $this->response->item($user,new UserTransformer())->setMeta($mate)->setStatusCode(201);
  }

}
