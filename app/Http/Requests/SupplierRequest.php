<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'name' => 'required|max:255',
            'email' => 'required|unique:employees,email,'.$this->id.',id|email',
            'phone' => 'required|unique:employees,phone,'.$this->id.',id|regex:/(0)[0-9]{9}/',
            'shopname' => 'required',
            'address' => 'required',
        
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Địa chỉ Email bị bỏ trống!',
            'name.required' => 'Họ tên đầy đủ bị bỏ trống!',
            'phone.required' => 'Số điện thoại bị bỏ trống!',
            'email.unique' => 'Địa chỉ Email đã được dùng!',
            'email.email' => 'Địa chỉ Email sai định dạng!',
            'name.max' => 'Tên đầy đủ quá dài!',
            'phone.unique' => 'Số điện thoại đã được dùng!',
            'address.required' => 'Địa chỉ bị bỏ trống',
            'shopname' => 'Tên cửa hàng bị bỏ trống',
            'phone.regex' => 'Đây không phải Số điện thoại',
            
        ];
    }
}
