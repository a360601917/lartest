<?php

namespace App\Transformers;

use App\Models\Advertising;
use League\Fractal\TransformerAbstract;

class AdvertisingTransformer extends TransformerAbstract {
  
  protected $availableIncludes = [];

  public function transform(Advertising $advertising) {
    return [
        'id' => $advertising->id,
        'sku'=>$advertising->sku,
        'category_id'=>$advertising->category_id,
        'category_child_id'=>$advertising->category_child_id,
        'title'=>$advertising->title,
        'etitle'=>$advertising->etitle,
        'image'=>$advertising->image,
        'price'=>$advertising->price,
        'describe'=>$advertising->describe,
        'sort'=>$advertising->sort,

        
        'created_at' => $advertising->created_at,
        'updated_at' => $advertising->updated_at,
    ];
  }
  
//  public function includeCategory(Goods $advertising){
//    return $this->item($advertising->category,new CategoryTransformer);
//  }

}
