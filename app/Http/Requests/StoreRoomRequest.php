<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'name' => 'required',
            'file' => 'required',
            'number_bed' => 'required',
            'price' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên phòng',
            'file.required' => 'Chưa chọn ảnh',
            'number_bed.required' => 'Chưa nhập số giường trong phòng',
            'price.required' => 'Chưa nhập giá phòng',
            'status.required' => 'Chưa nhập trạng thái phòng',
        ];
    }
}
