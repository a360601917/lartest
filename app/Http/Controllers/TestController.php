<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Overtrue\EasySms\EasySms;
use App\Handlers\SendSmsHandler;
use Illuminate\Support\Facades\Cache;

class TestController extends Controller {

  public function test(SendSmsHandler $sendSms, Request $request) {
    return bcrypt(6008);
  }

}
