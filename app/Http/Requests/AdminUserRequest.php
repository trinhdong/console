<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
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
            'name' => 'required|min:1|max:20|unique:admin_users,id',
            'email' => 'required|min:6|max:50||unique:admin_users',
            'password' => 'required|min:3|max:32',
            'password_again' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.min' => 'Tên không gồm tối thiểu 6 ký tự',
            'name.max' => 'Tên không gồm tối đa 20 ký tự',
            'email.min' => 'Tên không gồm tối thiểu 6 ký tự',
            'email.max' => 'Tên không gồm tối đa 50 ký tự',
            'email.required' => 'Vui lòng nhập email!',
            'email.unique' => 'Email đã tồn tại!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.min' => 'Mật Khẩu gồm tối thiểu 3 ký tự!',
            'password.max' => 'Mật Khẩu gồm tối đa 32 ký tự!',
            'password_again.required' => 'Vui lòng xác nhận mật khẩu!',
            'password_again.same' => 'Mật khẩu xác nhận không khớp'
        ];
    }
}
