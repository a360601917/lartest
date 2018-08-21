<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController as BaseLoginController;


class LoginController extends BaseLoginController {

  function index() {
    return view('admin.login.index');
  }

  function successRoute() {
    return route('admin.index');
  }

}
