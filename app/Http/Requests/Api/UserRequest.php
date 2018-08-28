<?php

namespace App\Http\Requests\Api;

//use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest {

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    switch ($this->method()) {
      case 'POST':
        return [
            'name' => 'between:5,6|unique:users',
            'password' => 'required|min:6|max:30',
            'verify_code'=>'filled',
            'phone'=>'regex:/^\d{6,}$/|unique:users',
        ];
    }
  }

  public function messages() {
    return [
        //'name.required'=>'用户名不能为空',
        'password.required'=>'用户名不能为空',
    ];
  }

}
