<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Overtrue\EasySms\EasySms;
use App\Handlers\SendSmsHandler;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class TestController extends Controller {

  public function test(SendSmsHandler $sendSms, Request $request) {
    $a=\App\Models\User::first();
event(new \App\Events\Test($a));

    return view('upload');
  }

  public function store(Request $request) {
    if ($file = $request->file('picture')) {

      $file = $request->file('picture');

      // 文件是否上传成功
      if ($file->isValid()) {

        // 获取文件相关信息
        $originalName = $file->getClientOriginalName(); // 文件原名
        $ext = $file->getClientOriginalExtension();     // 扩展名
        $realPath = $file->getRealPath();   //临时文件的绝对路径
        $type = $file->getClientMimeType();     // image/jpeg
        // 上传文件
        $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
        // 使用我们新建的uploads本地存储空间（目录）
        //这里的uploads是配置文件的名称
        //$bool = Storage::disk('s3')->put($filename, file_get_contents($realPath));
        $bool=Storage::disk('s3')->putFile(null, $file, 'public');
        var_dump($bool);
        dd($filename);
      }
    }
  }

}
