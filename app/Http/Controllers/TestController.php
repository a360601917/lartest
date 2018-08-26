<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Overtrue\EasySms\EasySms;
use App\Handlers\SendSmsHandler;
use Illuminate\Support\Facades\Cache;

class TestController extends Controller {

  public function test(SendSmsHandler $sendSms, Request $request) {
    if ($request->phone) {

      $a = Cache::get($sendSms->key.$request->phone);
      dd($a);
    }
    //$sendSms->code(15976816006); //dd('aaa');
    //dd($sendSms->error);
  }

}
