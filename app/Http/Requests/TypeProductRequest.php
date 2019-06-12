<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeProductRequest extends FormRequest
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
            'type_name'=> 'required|unique:product_types|min:3|max:50',
            'category_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'type_name.required' => 'Vui lòng nhập tên loại sản phẩm!',
            'type_name.unique' => 'Tên loại sản phẩm đã tôn tại!',
            'type_name.min' =>  'Tên loại sản phẩm không được nhỏ hơn 3 ký tự',
            'type_name.max' =>  'Tên loại sản phẩm không được lớn hơn 50 ký tự',
            'category_id.required' => 'Vui lòng chọn danh mục!'
        ];
    }
}
