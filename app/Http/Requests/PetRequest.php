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
            'pet_name' => 'required|unique:pets'
        ];
    }

    public function messages()
    {
        return [
            'pet_name.required' => 'Bạn chưa nhập tên thú cưng!',
            'pet_name.unique' => 'Tên thú cưng đã tôn tại!'
        ];
    }
}
