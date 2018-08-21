<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller {

  function index() {
    return view('home.login.index');
  }

  function store(LoginRequest $request) {
    $login_param = [
        'name' => $request->name,
        'password' => $request->password,
    ];
    if (Auth::attempt($login_param)) {
      return redirect()->intended($this->successRoute());
    }
    return redirect()->back();
  }

  function successRoute() {
    return route('/');
  }

}
