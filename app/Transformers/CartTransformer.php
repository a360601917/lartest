<?php

namespace App\Transformers;

use App\Models\Cart;
use League\Fractal\TransformerAbstract;

class CartTransformer extends TransformerAbstract {

  public function transform(Cart $cart) {
    return [
        'id' => $cart->id,
        'goods_id'=>$cart->goods_id,
        'quantity'=>$cart->quantity,
        'created_at' => $cart->created_at?$cart->created_at->toDateTimeString():null,
        'updated_at' => $cart->updated_at?$cart->updated_at->toDateTimeString():null,
    ];
  }

}
