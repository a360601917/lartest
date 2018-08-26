<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

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
            'username' => 'required|min:5|max:20',
            'password' => 'required|min:6|max:30',
            'code'=>'required',
        ];
    }
  }

  public function messages() {
    return [
        'username.required'=>'用户名不能为空',
        'password.required'=>'用户名不能为空',
    ];
  }

}
