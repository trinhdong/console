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
            'category_name' => 'required|unique:categories|min:3|max:50',
            'pet_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Vui lòng nhập tên danh mục!',
            'category_name.unique' => 'Tên danh mục đã tôn tại!',
            'category_name.min' => 'Tên danh mục không được nhỏ hơn 3 ký tự',
            'category_name.max' => 'Tên danh mục không được lớn hơn 50 ký tự',
            'pet_id.required' => 'Vui lòng chọn thú cưng!',
        ];
    }
}
