<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
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
            'email' => 'required|unique:users,email,'.$this->id.',id|email',
            'name' => 'required',
            'phone' => 'nullable|regex:/(0)[0-9]{9}/|unique:users,phone,'.$this->id.',id',
        ];
    }
    
    public function messages()
    {
        return [
            'email.required' => 'Địa chỉ Email bị bỏ trống!',
            'email.unique' => 'Địa chỉ Email đã được sử dụng!',
            'email.email' => 'Địa chỉ Email không đúng định dạng!',
            'name.required' => 'Tên bị bỏ trống!',
            'phone.regex' => 'Số điện thoại không đúng định dạng!',
            'phone.unique' => 'Số điện thoại đã được sử dụng!'
        ];
    }
}
