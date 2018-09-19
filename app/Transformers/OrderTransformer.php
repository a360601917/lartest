<?php

namespace App\Transformers;

use App\Models\Order;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract {

  public function transform(Order $order) {
    return [
        'id' => $order->id,
        //'user_id'=>$order->user_id,
        'goods'=>$order->goods,
        'money'=>$order->money,
        'pay'=>$order->pay,
        'pay_at'=>$order->pay_at,
        'address'=>$order->address,

        'created_at' => $order->created_at?$order->created_at->toDateTimeString():null,
        'updated_at' => $order->updated_at?$order->updated_at->toDateTimeString():null,
    ];
  }

}
