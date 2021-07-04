<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
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
         'passwordnow' => 'required',
         'passwordnew'=> 'required|min:6',
         'passwordverify'=> 'required|same:passwordnew',
        ];
    }

    public function messages()
    {
        return [
            'passwordnow.required' => 'Mật khẩu hiện tại bị bỏ trống!',
            'passwordnew.required' => 'Mật khẩu mới bị bỏ trống!',
            'passwordnew.min' => 'Mật khẩu mới phải chứa ít nhất 6 kí tự!',
            'passwordverify.required' => 'Xác nhận mật khẩu mới bị bỏ trống!',
            'passwordverify.same'=>'Mật khẩu mới và xác nhận mật khẩu mới không giống nhau!'
        ];
    }
}
