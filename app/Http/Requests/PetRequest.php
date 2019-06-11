<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            'pet_name' => 'required|unique:pets|min:2|max:15'
        ];
    }

    public function messages()
    {
        return [
            'pet_name.required' => 'Vui lòng nhập tên thú cưng!',
            'pet_name.unique' => 'Tên thú cưng đã tôn tại!',
            'pet_name.min' =>  'Tên thú cưng không được nhỏ hơn 2 ký tự',
            'pet_name.max' =>  'Tên thú cưng không được lớn hơn 15 ký tự'
        ];
    }
}
