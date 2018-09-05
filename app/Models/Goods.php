<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model {

  protected $fillable = [
      'sku', 'category_id ', 'category_child_id', 'title', 'etitle', 'image', 'price','describe','sort'
  ];

}
