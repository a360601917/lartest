<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserRequest;
use Illuminate\Support\Facades\Cache;
use App\Models\User;

class UserController extends Controller
{
  public function store(UserRequest $request){
    $key=$request->key;
    $code=$request->code;
    $verify_data= Cache::get($key) or $this->response->error('验证码失效',422);
    hash_equals($code, $verify_data->code) or $this->response->errorUnauthorized('验证码不正确');
    
    User::create([
        
    ]);
    
    
    $username=$request->username;
    
  }
}
