<?php

namespace App\Http\Controllers\Api\Advertising;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Models\Advertising;
use App\Transformers\AdvertisingTransformer;
use App\Http\Controllers\Api\Controller;

class AdvertisingController extends Controller
{
  public function index(){
    $advertisings=Advertising::all();
    return $this->response->collection($advertisings, new AdvertisingTransformer);
  }
  public function show(Advertising $advertising){
    return $this->response->item($advertising, new AdvertisingTransformer);
  }
}
