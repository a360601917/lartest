<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use App\Http\Controllers\LoginController as BaseLoginController;
use Auth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller {

  public function __construct() {
    $this->middleware('guest:admin',['except'=>'destroy']);
  }

  function index() {
    return view('admin.login.index');
  }

  function successRoute() {
    return route('admin.index');
  }

  function store(LoginRequest $request) {
    $login_param = [
        'name' => $request->name,
        'password' => $request->password,
    ];
    if (Auth::guard('admin')->attempt($login_param)) {
      return redirect()->intended($this->successRoute());
    }
    return redirect()->back();
  }

  public function destroy() {
    Auth::logout();
    //session()->flash('success', '退出成功');
    return redirect(route('admin.login'));
  }

}
