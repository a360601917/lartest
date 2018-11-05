<?php

namespace App\Http\Controllers\Api\Order;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Goods;

use App\Transformers\OrderTransformer;
use App\Http\Requests\Api\OrderRequest;
use App\Handlers\JsonParamCheck;
use App\Http\Controllers\Api\Controller;

//use App\Http\Controllers\Controller;

class OrderController extends Controller {

  public function index(User $user,Request $request) {
    $user_id=$user->tokenId();
    $limit = $request->limit ?: 20;
    $orders=Order::where('user_id',$user_id)->paginate($limit);
    return $this->response()->paginator($orders, new OrderTransformer);
    
  }

  public function store(Order $order, OrderRequest $request,Goods $goods) {
    $jsonParamCheck=new JsonParamCheck;
    $goods= $jsonParamCheck->check($request->goods, $goods, 'id', 'goods_id');
    if(!$goods){
      return $this->response->error($jsonParamCheck->error, 404);
    }
    $json_goods= json_decode($request->goods,1);
    foreach ($json_goods as $v){
      $_json_goods[$v['goods_id']]=$v;
    }
    
    foreach($goods as $v){
      $pay_quantity=$_json_goods[$v->id]['quantity'];
      if($v->inventory<$pay_quantity){
        return $this->response->error($v->id.'商品数量己不足', 404);
      }
      $_json_goods[$v->id]['price']=$v->price;
      $_json_goods[$v->id]['total_price']=round($_json_goods[$v->id]['quantity']*$v->price,2);
    }
    $total_price=array_sum(array_column($_json_goods, 'total_price'));
    
    $user_id=(new User())->tokenId();
    
    //创建订单
    $order->address=$request->only('address');
    $order->goods=$_json_goods;
    $order->money=$total_price;
    $order->user_id=$user_id;
    $order->save();
    //
    
    
    return $this->response->item($order, new OrderTransformer());
    
  }

  public function update(Order $order) {
    
  }

  public function show(Order $order) {
    return $this->response->item($order, new OrderTransformer());
  }

  public function destroy(Order $order) {
    $order->delete();
    return $this->response->noContent();
  }

}
