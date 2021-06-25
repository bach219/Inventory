<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name' => 'required|unique:categories,category_name,'.$this->id.',id|max:20'
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Tên danh mục món bị bỏ trống!',
            'category_name.unique' => 'Tên danh mục món đã có!',
            'category_name.max' => 'Tên danh mục món quá dài!',
        ];
    }
}
