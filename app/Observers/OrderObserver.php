<?php

namespace App\Observers;

use App\Models\Order;
use App\Models\Cart;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderObserver {
//  public function creating(Order $order){
//    
//  }

  public function saved(Order $order) {
    foreach($order->goods as $v){
      $_json_goods[$v['goods_id']]=$v;
    }
    $carts = Cart::where([['user_id', '=', $order->user_id]])->whereIn('goods_id', array_keys($_json_goods))->get();
    foreach ($carts as $v) {
      $quantity = $_json_goods[$v->goods_id]['quantity'];
      if ($v->quantity > $quantity) {
        $v->decrement('quantity', $quantity);
      } else {
        $v->delete();
      }
    }
  }

}
