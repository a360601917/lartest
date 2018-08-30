<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Requests\Api\VerifyCodeRequest;
use App\Handlers\SendSmsHandler;
use Illuminate\Support\Facades\Cache;

class VerifyCodeController extends Controller {

  public function store(VerifyCodeRequest $request, SendSmsHandler $sms) {
    $captcha_key=$request->captcha_key;
    if(!$cache_data=Cache::get($captcha_key)){
      return $this->response->error('验证码过期', 422);
    }
    $code=$request->captcha_code;
    if($cache_data['code']!=$code){
      Cache::forget($captcha_key);
      return $this->response->errorUnauthorized('验证不正确');
    }
    $phone=$cache_data['phone'];
    //$phone = $request->phone;
    $expired_at = now()->addMinutes(30);
    $key = $sms->code($phone, $expired_at);

    return $key ? $this->response()->array(['key' => $key, 'expired_at' => $expired_at->toDateTimeString()]) : $this->response->error('短信发送不成功', 503);
  }

}
