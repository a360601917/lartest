<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class IndexController extends Controller {

  public function __construct() {
    
  }

  public function index() {

    //$this->authorize('isAdmin');
    return view('admin.layouts.index');
  }

  public function test() {
    return view('admin.layouts.test');
  }

}
