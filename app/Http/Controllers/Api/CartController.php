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
      foreach($carts as $v){
        if(!$v['goods_id']){
          return $this->response->error('没给商品id', 404);
        }
        $goods_arr[$v['goods_id']]=$v;
      }
      $goods_ids = array_keys($goods_arr);
      $goodss = Goods::whereIn('id', $goods_ids)->get()->toArray();
      if (count($goodss) != count($goods_ids)) {
        $diff = array_diff($goods_ids, array_column($goodss, 'id'));
        return $this->response->error(implode(',', $diff) . '商品不存在', 404);
      }
      
      foreach($goodss as $v){
//        $quantity=$goods_arr[$v->id]['quantity'];
//        if($v->inventory<$quantity){
//          return $this->response->error('库存不足', 404);
//        }
        $goods_arr[$v['id']]= $this->addUserId($goods_arr[$v['id']]);
        $this->CreateOrUpdate($goods_arr[$v['id']]);
      }

//      foreach ($carts as &$v) {
//        $v = $this->addUserId($v);
//        $this->CreateOrUpdate($v);
//      }
//      unset($v);

      //Cart::insert($carts);
      $carts= Cart::where('user_id',(new User)->tokenId())->get();
      return $this->response->collection($carts, new CartTransformer());
    } else {
      $carts = $request->only('goods_id', 'quantity');
      $carts = $this->addUserId($carts);
      //Cart::create($carts);
      $cart=$this->CreateOrUpdate($carts);
      return $this->response->item($cart,new CartTransformer());
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
  
  private function CreateOrUpdate($cart){
    $user_id=(new User)->tokenId();
    $_cart=Cart::where([['user_id','=',$user_id],['goods_id','=',$cart['goods_id']]])->first();
    if($_cart){
      $_cart->increment('quantity',$cart['quantity']);
      $_cart->save();
    }else{
      $_cart=Cart::create($cart);
    }
    return $_cart;
  }

}
