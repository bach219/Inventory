<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
        ];
    }
// password_confirmation
    public function messages()
    {
        return [
            'email.required' => 'Địa Email bị bỏ trống!',
            'password.required' => 'Mật khẩu bị bỏ trống!',
            'name.required' => 'Tên bị bỏ trống!',
            'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự!',
            'email.unique' => 'Địa Email đã được sử dụng!',
            'email.max' => 'Địa Email quá dài!',
            'password_confirmation.required' => 'Xác nhận mật khẩu bị bỏ trống!',
            'password_confirmation.same' => 'Xác nhận mật khẩu không đúng!',
        ];
    }
}
