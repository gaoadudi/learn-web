<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPasswordRequest extends FormRequest
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
            'password_old'=>'required|min:5',
            'password_new'=>'required|min:5',
            'password_confirmation'=>'required|same:password_new',
        ];
    }
    public function messages()
    {
        return [
            'password_old.required'=>'Không được để trống Mật khẩu',
            'password_old.min'=>'Mật khẩu không được nhỏ hơn 5 ký tự',
            'password_new.required'=>'Không được để trống Mật khẩu',
            'password_new.min'=>'Mật khẩu không được nhỏ hơn 5 ký tự',
            'password_confirmation.required'=>'Không được để trống Mật khẩu xác nhận',
            'password_confirmation.same'=>'Mật khẩu xác nhận không chính xác',
        ];
    }
}
