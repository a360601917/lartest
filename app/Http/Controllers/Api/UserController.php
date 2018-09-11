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

    if ($key = $request->key) {

      if (!$verify_data = Cache::get($key)) {
        return $this->response->error('验证码失效', 422);
      }

      $verify_code = $request->verify_code;
      if ($verify_code != $verify_data['verify_code']) {
        Cache::forget($key);
        return $this->response->errorUnauthorized('验证码不正确');
      }

      $data['phone'] = $verify_data['phone'];
      $data['name'] = $request->name ?? $data['phone'];
      $data['password'] = bcrypt(substr($data['phone'], -4));
    } elseif ($name = $request->name) {
      $data['name'] = $name;
    } elseif ($email = $request->email) {
      $data['email'] = $email;
    }

    $data['password'] = $data['password'] ?? bcrypt($request->password);
    $user = User::create($data);

    $mate = [
        'access_token' => \Auth::guard('api')->fromUser($user),
        'token_type' => 'Bearer',
        'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
    ];

    return $this->response->item($user, new UserTransformer())->setMeta($mate)->setStatusCode(201);
  }

}
