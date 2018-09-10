<?php

namespace App\Handlers;

use Overtrue\EasySms\EasySms;
use Illuminate\Support\Facades\Cache;

class SendSmsHandler {

  public $key = 'verify_code_';
  public $error = [];
  private $template = ['ch' => ['template' => 'SMS_138390081'], 'au' => ['prefix' => 00, 'template' => 'SMS_138062207']];

  public function code($phone, $time) {
    $easySms = app('easysms');
    $code = str_pad(random_int(1, 9999), 4, 0, STR_PAD_LEFT);
    try {
      $template= $this->checkPhone($phone);
      //$code = 1234;
      $result = $easySms->send($template['phone'], [
          'template' => $template['template'],
          'data' => [
              'code' => $code
          ],
      ]);
      

      $key = $this->key . str_random(10);
      $time = $time ?: now()->addMinutes(10);
      Cache::put($key, ['verify_code' => $code, 'phone' => $phone], $time);
      return $key;
    } catch (\Overtrue\EasySms\Exceptions\NoGatewayAvailableException $exception) {
      $message = $exception->getException('aliyun')->getMessage();
      $this->error[] = $message;
    }
  }

  public function checkPhone($phone) {
    switch (substr($phone, 0, 2)) {
      case '61':
        $data = [
            'phone' => $this->template['au']['prefix'] . $phone,
            'template' => $this->template['au']['template'],
        ];
        break;
      case '00':
        $data = [
            'phone' => $phone,
            'template' => $this->template['au']['template'],
        ];
        break;
      default:
        $data = [
            'phone' => $phone,
            'template' => $this->template['ch']['template'],
        ];
    }
    return $data;
  }

}
