<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Api\CategoryRequest;
use App\Transformers\CategoryTransformer;

class CategoryController extends Controller
{
  public function index(){
    $categorys=Category::all();
    return $this->response->collection($categorys, new CategoryTransformer);
  }
  public function show(Category $category){
    return $this->response->item($category,new CategoryTransformer);
  }
}
