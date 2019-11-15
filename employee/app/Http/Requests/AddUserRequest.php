<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'username'=>'required|min:3|max:20|unique:users,username,'.$this->id,
            'email'=>'required|min:10|email',
            'role'=>'required|max:2|numeric',
            //'password'=>'required|min:5|confirmed',
            //'password_confirmation'=>'required|min:5',
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>'Không được để trống Tên người dùng',
            'username.min'=>'Tên người dùng không được nhỏ hơn 3 ký tự',
            'username.max'=>'Tên người dùng không được nhiều hơn 20 ký tự',
            'username.unique'=>'Tên đăng nhập đã tồn tại',
            'email.required'=>'Không được để trống Email',
            'email.min'=>'Email không được nhỏ hơn 10 ký tự',
            'email.email'=>'Không đúng định dạng Email',
            'role.required'=>'Không được để trống Quyền người dùng',
            'role.max'=>'Phân quyền theo số 1->2',
            'role.numeric'=>'Phân quyền theo số 1->2',
            //'password.required'=>'Không được để trống Mật khẩu',
            //'password.min'=>'Mật khẩu không được nhỏ hơn 5 ký tự',
            //'password.confirmed'=>'Mật khẩu không xác nhận không chính xác',
            //'password_confirmation.required'=>'Không được để trống Mật khẩu xác nhận',
            //'password_confirmation.min'=>'Mật khẩu không được nhỏ hơn 5 ký tự',
        ];
    }
}
