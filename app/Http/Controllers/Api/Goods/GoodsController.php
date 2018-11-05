<?php

namespace App\Http\Controllers\Api\Goods;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Transformers\GoodsTransformer;
use App\Http\Requests\Api\GoodsRequest;
use App\Models\Goods;
use App\Http\Controllers\Api\Controller;

class GoodsController extends Controller {

  public function index(GoodsRequest $request) {
    $limit = $request->limit ?: 20;
    $goodss = Goods::paginate($limit);
    return $this->response()->paginator($goodss, new GoodsTransformer);
  }

  public function show(Goods $goods) {
    return $this->response->item($goods, new GoodsTransformer);
  }

}
