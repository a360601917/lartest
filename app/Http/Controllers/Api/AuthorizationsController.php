<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use Auth;

class AuthorizationsController extends Controller {
  
  public function store(){
    
  }

  public function update() {
    $token = Auth::guard('api')->refresh();
    return $this->respondWithToken($token);
  }

  public function delete() {
    Auth::guard('api')->logout();
    return $this->response->noContent();
  }

}
