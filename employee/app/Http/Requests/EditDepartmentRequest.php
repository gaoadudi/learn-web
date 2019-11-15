<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDepartmentRequest extends FormRequest
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
            'officephone'=>'required|min:9|numeric',
            'manager'=>'required|min:5',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Không được để trống Tên phòng ban',
            'name.min'=>'Tên phòng ban không được nhỏ hơn 5 ký tự',
            'officephone.required'=>'Không được để trống Số điện thoại',
            'officephone.min'=>'Số điện thoại không được ít hơn 9 số',
            'officephone.numeric'=>'Số điện thoại chỉ bao gồm các số',
            'manager.required'=>'Không được để trống Quản lý',
            'manager.min'=>'Tên quản lý không được nhỏ hơn 5 ký tự',
        ];
    }
}
