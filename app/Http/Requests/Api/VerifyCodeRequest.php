<?php

namespace App\Http\Requests\Api;

//use Illuminate\Foundation\Http\FormRequest;

class VerifyCodeRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      $method= $this->method();
      if($method=='POST')
        return [
            'phone'=>'regex:/^\d{6,}$/',
            'captcha_key'=>'required',
            'captcha_code'=>'required'
        ];
    }
    public function messages() {
      return[
          'phone.required'=>'手机号不能为空',
          'phone.unique'=>'手机号己存在',
          'phone.regex'=>'手机号长度？',
          
          
      ];
    }
}
