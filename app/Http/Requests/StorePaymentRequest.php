<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
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
            'price' => 'required',
            'method' => 'required',
            'type_payment' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'price.required' => 'Chưa nhập số tiền hóa đơn',
            'method.required' => 'Chưa nhập phương thức thanh toán',
            'type_payment.required' => 'Chưa chọn loại thanh toán',
        ];
    }
}
