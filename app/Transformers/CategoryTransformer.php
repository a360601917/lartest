<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract {

  protected $availableIncludes = ['goods'];

  public function transform(Category $category) {
    return [
        'id' => $category->id,
        'name' => $category->name,
        'pid' => $category->pid,
        'sort' => $category->sort,
        'created_at' => !$category->created_at ?? $category->created_at->toDateTimeString(),
        'updated_at' => !$category->updated_at ?? $category->updated_at->toDateTimeString(),
    ];
  }
  
  public function includeGoods(Category $category){
    return $this->collection($category->goods, new GoodsTransformer());
  }

}
