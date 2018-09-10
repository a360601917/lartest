<?php

namespace App\Transformers;

use App\Models\Goods;
use League\Fractal\TransformerAbstract;

class GoodsTransformer extends TransformerAbstract {
  
  protected $availableIncludes = ['category'];

  public function transform(Goods $goods) {
    return [
        'id' => $goods->id,
        'sku'=>$goods->sku,
        'category_id'=>$goods->category_id,
        'category_child_id'=>$goods->category_child_id,
        'title'=>$goods->title,
        'etitle'=>$goods->etitle,
        'image'=>$goods->image,
        'price'=>$goods->price,
        'describe'=>$goods->describe,
        'sort'=>$goods->sort,

        
        'created_at' => $goods->created_at,
        'updated_at' => $goods->updated_at,
    ];
  }
  
  public function includeCategory(Goods $goods){
    return $this->item($goods->category,new CategoryTransformer);
  }

}
