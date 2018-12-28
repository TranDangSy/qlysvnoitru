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
            'number_bed' => 'required|integer',
            'price' => 'required|integer',
            'status' => 'required',
            'water_price' => 'required|integer',
            'electric_price' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên phòng',
            'file.required' => 'Chưa chọn ảnh',
            'number_bed.required' => 'Chưa nhập số giường trong phòng',
            'price.required' => 'Chưa nhập giá phòng',
            'price.integer' => 'Giá phải là số',
            'number_bed.integer' => 'Số giường phải là số',
            'status.required' => 'Chưa nhập trạng thái phòng',
            'water_price.required' => 'Chưa nhập số nước',
            'water_price.integer' => 'Số nước phải là số',
            'electric_price.required' => 'Chưa nhập số điện',
            'electric_price.integer' => 'Số điện phải là số',
        ];
    }
}
