<?php

namespace App\Http\Controllers\Admin\Goods;

use Illuminate\Http\Request;

use App\Http\Controllers\Admin\Controller;
use App\Models\Goods;

class GoodsController extends Controller {

  public function index() {
    $goodss=Goods::paginate(10);
    return view('admin.goods.index');
  }

}
