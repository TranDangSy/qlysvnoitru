<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'min:1', 
            'newpassword' => 'min:3|max:32',
            'passwordagain' => 'same:newpassword',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Tên người dùng phải lớn hơn 1 kí tự',
            'newpassword.min' => 'Mật khẩu phải có ít nhất 3 kí tự',   
            'newpassword.max' => 'Mật khẩu tối đa có 32 kí tự',
            'passwordagain.same' => 'Mật khẩu nhập lại chưa đúng',
        ];
    }
}
