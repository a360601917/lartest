<?php

namespace App\Http\Requests\Api;

//use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      switch ($this->method()){
        case 'POSE':
          $rule=[
              'carts'=>'required_without:goods_id|json',
              //'user_id'=>'required_without:carts|numeric',
              'goods_id'=>'required_without:carts|numeric|exists:goods,id',
              'quantity'=>'required_without:carts|integer|min:1',
          ];
          break;
      }

    }
}
