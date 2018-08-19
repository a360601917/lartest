<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
  public function index(){
    return view('admin.layouts.index');
  }
  public function test(){
    return view('admin.layouts.test');
  }
}
