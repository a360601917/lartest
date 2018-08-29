<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CaptchaRequest;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Cache;

class CaptchasController extends Controller {

  public function store(CaptchaRequest $request, CaptchaBuilder $captchaBuilder) {
    $key = 'captcha_' . str_random(10);
    $phone = $request->phone;
    $captcha = $captchaBuilder->build();
    $expired_at = now()->addMinutes(5);
    Cache::put($key, ['phone' => $phone, 'code' => $captcha->getPhrase()], $expired_at);
    $data = [
        'captcha_key' => $key,
        'expired_at' => $expired_at->toDateTimeString(),
        'captcha_image_content' => $captcha->inline(),
    ];
    return $this->response->array($data)->setStatusCode(201);
  }

}
