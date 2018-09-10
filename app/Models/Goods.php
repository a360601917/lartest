<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Goods extends Model {
  
  protected $table='goods';

  protected $fillable = [
      'sku', 'category_id ', 'category_child_id', 'title', 'etitle', 'image', 'price', 'describe', 'sort'
  ];

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function categoryChild() {
    return $this->belongsTo(Category::class, 'category_child_id', 'id');
  }

}
