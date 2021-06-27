<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
         'email' => 'required|email',
         'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Địa Email bị bỏ trống!',
            'email.email' => 'Địa Email không phù hợp!',
            'password.required' => 'Mật khẩu bị bỏ trống!'
        ];
    }
}
