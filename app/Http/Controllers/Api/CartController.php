<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Transformers\CartTransformer;
use App\Http\Requests\Api\CartRequest;
use App\Models\Goods;

class CartController extends Controller {

  public function index() {
    $user = new User;
    $user_id = $user->tokenId();
    $carts = Cart::where('user_id', $user_id)->get();
    return $this->response->collection($carts, new CartTransformer);
  }

  public function store(CartRequest $request) {
    if ($carts = $request->carts) {
      $carts = json_decode($carts, 1);
      $goods_ids = array_column($carts, 'goods_id');
      if (!$goods_ids) {
        return $this->response->error('没给商品', 404);
      }
      $goodss = Goods::whereIn('id', $goods_ids)->get()->toArray();
      if (count($goodss) != count($goods_ids)) {
        $diff = array_diff($goods_ids, array_column($goodss, 'id'));
        return $this->response->error(implode(',', $diff) . '商品不存在', 404);
      }

      foreach ($carts as &$v) {
        $v = $this->addUserId($v);
      }
      unset($v);

      Cart::insert($carts);
      return $this->response->created();
    } else {
      $carts = $request->only('goods_id', 'quantity');
      $carts = $this->addUserId($carts);
      Cart::insert($carts);
      return $this->response->created();
    }
  }

  public function update(CartRequest $request, Cart $cart) {
    if ($quantity = $request->quantity) {
      $cart->quantity = $quantity;
      $cart->save();
      return $this->response->noContent();
    } elseif ($action = $request->action) {
      switch (strtolower($action)) {
        case 'add':
          $cart->increment('quantity');
          break;
        case 'reduce':
          $cart->decrement('quantity');
          break;
      }
      $cart->save();
      return $this->response->noContent();
    }
  }

  public function destroy(Cart $cart) {
    $cart->delete();
    return $this->response->noContent();
  }

  private function addUserId($arr) {
    $user_id = (new User)->tokenId();
    $arr['user_id'] = $user_id;
    return $arr;
  }

}
