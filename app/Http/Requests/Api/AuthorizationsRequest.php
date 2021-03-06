<?php

namespace App\Http\Requests\Api;

//use Illuminate\Foundation\Http\FormRequest;

class AuthorizationsRequest extends FormRequest {

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    switch ($this->method()) {
      case 'POST':
        return [
            'name' => 'filled|min:5',
            'password' => 'required',
            'phone' => 'filled|regex:/^\d{6,}$/',
        ];
        break;
      default :
        return [];
    }

  }

}
