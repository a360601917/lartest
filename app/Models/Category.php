<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Goods;

class Category extends Model {

  protected $table = 'category';
  

  public function goods() {
    return $this->hasMany(Goods::class);
  }
  
  public function goodsChild(){
    return $this->hasMany(Goods::class,'category_child_id','id');
  }

}
