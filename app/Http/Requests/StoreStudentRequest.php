<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'age' => 'required',
            'gender' => 'required',
            'status' => 'required',
            'file' => 'required|image',
            'note' => 'required',
            'birth_of_date' => 'required',
            'id_card' => 'required',
            'room_id' => 'required|exists:rooms,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Bạn chưa nhập tên sinh viên',
            'age.required' => 'Chưa nhập tuổi',
            'gender.required' => 'Chưa nhập giới tính',
            'status.required' => 'Chưa nhập trạng thái',
            'note.required' => 'Chưa nhập giới tính',
            'file.required' => 'Chưa chọn ảnh',
            'birth_of_date.required' => 'Chưa nhập ngày tháng năm sinh',
            'id_card.required' => 'Chưa nhập mã sinh viên',
        ];
    }
}
