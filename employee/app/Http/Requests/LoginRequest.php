<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'username'=>'required|min:3|max:20',
            'password'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Không được để trống Tên đăng nhập',
            'username.min'=>'Tên đăng nhập không nhỏ hơn 3 ký tự',
            'username.max'=>'Tên đăng nhập không lớn hơn 20 ký tự',
            'password.required'=>'Không được để trống Mật khẩu',
        ];
    }
}
