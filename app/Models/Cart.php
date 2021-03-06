<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
  protected $table='cart';

  protected $guarded = [];

  public function user() {
    return $this->belongsTo('user');
  }

}
