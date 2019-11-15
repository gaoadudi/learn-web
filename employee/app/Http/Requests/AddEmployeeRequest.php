<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddEmployeeRequest extends FormRequest
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
            'name'=>'required|min:5',
            'photo'=>'required|max:500',
            'jobtitle'=>'required|min:3',
            'cellphone'=>'required|min:9|numeric',
            'email'=>'required|min:10|email|unique:employee,email,'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Không được để trống Tên nhân viên',
            'name.min'=>'Tên nhân viên không được nhỏ hơn 5 ký tự',
            'photo.required'=>'Chưa chọn file ảnh',
            'photo.max'=>'Size ảnh không vượt quá 500Kb',
            'jobtitle.required'=>'Không được để trống Chức danh',
            'jobtitle.min'=>'Tên chức danh không được nhỏ hơn 3 ký tự',
            'cellphone.required'=>'Không được để trống Số điện thoại',
            'cellphone.min'=>'số điện thoại không được ít hơn 9 số',
            'cellphone.numeric'=>'Số điện thoại chỉ bao gồm các số',
            'email.required'=>'Không được để trống Email',
            'email.min'=>'Email không được nhỏ hơn 10 ký tự',
            'email.email'=>'Không đúng định dạng Email',
            'email.unique'=>'Email đã tồn tại',
        ];
    }
}
