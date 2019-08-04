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
            'product_name' => 'required||min:3|max:100|unique:products',
            'quantity' => 'required',
            'price' => 'required',
            'image'=>'image|mimes:jpeg,jpg,bmp,png,gif'
        ];
    }
    public function messages()
    {
        return [
            'product_name.required' => 'Vui lòng nhập tên sản phẩm!',
            'product_name.unique' => 'Tên sản phẩm đã tôn tại!',
            'product_name.min' => 'Tên không được nhỏ hơn 3 ký tự',
            'product_name.max' => 'Tên không được lớn hơn 50 ký tự',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'price.required' => 'Vui lòng nhập giá cho sản phẩm'
        ];
    }
}
