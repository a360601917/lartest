<?php

namespace App\Http\Controllers\Admin;

//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Auth;

class IndexController extends Controller {

//  public function __construct() {
//    $this->middleware('auth');
//    $this->middleware('admin');
//  }

  public function index() {


    return view('admin.index');
  }

  public function test() {
    return view('admin.layouts.test');
  }

}
