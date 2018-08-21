<?php

namespace App\Http\Requests;

//use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends Request {

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
        'name' => 'required|between:3,25',
        'password' => 'required|between:3,25',
    ];
  }

  public function messages() {
    $between='必须介于 3 - 25 个字符之间。';
    $required='不能为空。';
    return [
        'name.between' => '用户名'.$between,
        'name.required' => '用户名'.$required,
        'password.required'=>'密码'.$required,
        'password.between'=>'密码'.$between,
    ];
  }

}
