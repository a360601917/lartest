<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $guarded = [];
    protected $casts=[
        'goods'=>'array',
        'address'=>'array',
        
    ];


    public function user(){
      return $this->belongsTo('user');
    }
}
