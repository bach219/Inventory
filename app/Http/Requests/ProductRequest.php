<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_name' => 'required|max:255',
            'product_code' => 'required|unique:products|max:255',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'root'=> 'required',
            'buying_price' => 'required',
            'selling_price' => 'required',
            'buying_date' => 'required',
            'product_quantity' => 'required',
        ];
    }

    
    public function messages()
    {  
        return [
            'product_name.required' => 'Tên sản phẩm bị bỏ trống!',
            'product_code.required' => 'Mã sản phẩm bị bỏ trống!',
            'root.required' => 'Giá gốc bị bỏ trống!',
            'buying_price.required' => 'Giá mua vào bị bỏ trống!',
            'selling_price.required' => 'Giá bán bị bỏ trống!',
            'buying_date.required' => 'ngày bán bị bỏ trống!',
            'product_quantity.required' => 'số lượng bị bỏ trống!',
        ];
    }
    
}
