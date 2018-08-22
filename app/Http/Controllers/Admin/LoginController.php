<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController as BaseLoginController;
use Auth;

class LoginController extends BaseLoginController {

  function index() {
    return view('admin.login.index');
  }

  function successRoute() {
    return route('admin.index');
  }

  public function destroy() {
    Auth::logout();
    //session()->flash('success', '退出成功');
    return redirect(route('admin.login'));
  }

}
