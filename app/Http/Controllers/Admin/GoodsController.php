<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

//use App\Http\Controllers\Controller;
use App\Models\Goods;

class GoodsController extends Controller {

  public function index() {
    $goodss=Goods::paginate(10);
    return view('admin.goods.index');
  }

}
