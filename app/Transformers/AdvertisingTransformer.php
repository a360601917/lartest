<?php

namespace App\Transformers;

use App\Models\Advertising;
use League\Fractal\TransformerAbstract;

class AdvertisingTransformer extends TransformerAbstract {
  
  protected $availableIncludes = [];

  public function transform(Advertising $advertising) {
    return [
        'id' => $advertising->id,

        'title'=>$advertising->title,
        'image'=>$advertising->image,
        'link'=>$advertising->link,
        'sort'=>$advertising->sort,

        
        'created_at' => $advertising->created_at,
        'updated_at' => $advertising->updated_at,
    ];
  }
  
//  public function includeCategory(Goods $advertising){
//    return $this->item($advertising->category,new CategoryTransformer);
//  }

}
