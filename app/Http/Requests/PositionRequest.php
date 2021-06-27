<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            
            'position_name' => 'required|unique:positions,position_name,'.$this->id.',id|max:20'
            
        ];
    }
    public function messages()
    {
        return [
            'position_name.required' => 'Tên chức vụ bị bỏ trống!',
            'position_name.unique' => 'Tên chức vụ đã có!',
            'position_name.max' => 'Tên chức vụ quá dài!',
        ];
    }
}
