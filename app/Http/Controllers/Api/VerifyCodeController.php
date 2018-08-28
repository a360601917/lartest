<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Requests\Api\VerifyCodeRequest;
use App\Handlers\SendSmsHandler;
use Illuminate\Support\Facades\Cache;

class VerifyCodeController extends Controller {

  public function store(VerifyCodeRequest $request, SendSmsHandler $sms) {
    $phone = $request->phone;
    $expired_at = now()->addMinutes(30);
    $key = $sms->code($phone, $expired_at);

    return $key ? $this->response()->array(['key' => $key, 'expired_at' => $expired_at]) : $this->response->error('短信发送不成功', 503);
  }

}
