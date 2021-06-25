<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'name' => 'required|max:20',
            // 'address' => 'required',
            // 'email' => 'required|email|unique:customers,email,'.$this->id.',id',
            // 'phone' => 'required|unique:customers,phone,'.$this->id.',id|regex:/(0)[0-9]{9}/',
        ];
    }

    public function messages()
    {
        return [
            // 'email.email' => 'Địa chỉ Email sai định dạng!',
            // 'email.unique' => 'Địa chỉ Email đã được dùng!',
            'name.required' => 'Tên bị bỏ trống',
            // 'address.required' => 'Địa chỉ bị bỏ trống',
            // 'email.required' => 'Email bị bỏ trống',
            // 'phone.required' => 'Số điện thoại bị bỏ trống',
            'name.max' => 'Tên đầy đủ quá dài!',
            // 'phone.unique' => 'Số điện thoại đã được dùng!',
            // 'phone.regex' => 'Đây không phải Số điện thoại',
        ];
    }
}
