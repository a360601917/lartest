<?php

namespace App\Handlers;

use Overtrue\EasySms\EasySms;
use Illuminate\Support\Facades\Cache;

class SendSmsHandler {

  public $key = 'verify_code_';
  public $error = [];

  public function code($phone,$time) {
    $easySms = app('easysms');
    $code = str_pad(random_int(1, 9999),4,0,STR_PAD_LEFT);
    try {
      
//      $result = $easySms->send($phone, [
//          'template' => 'SMS_138390081',
//          'data' => [
//              'code' => $code
//          ],
//      ]);
      $code=1234;
      
      $key= $this->key.str_random(10);
      $time=$time?:now()->addMinutes(10);
      Cache::put($key, ['verify_code' => $code, 'phone' => $phone], $time);
      return $key;
    } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
      $message = $exception->getException('aliyun')->getMessage();
      $this->error[] = $message;
    }
  }

}
