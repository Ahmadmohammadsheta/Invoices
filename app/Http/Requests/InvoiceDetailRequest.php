<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceDetailRequest extends FormRequest
{
    /**
     * store validations
     */
    private function storeRequest()
    {
        return [
            'invoice_id' => 'required',
            'invoice_number' => 'required',
            'product' => 'required',
            'section' => 'required',
            'status' => 'required',
            'value_status' => 'required',
            'payment_date' => 'required',
            'note' => 'required',
            'user' => 'required',
        ];
    }

    /**
     * update validations
     */
    private function updateRequest()
    {
        return [
            'name' => ['required'], //AMA>true
        ];
    }

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return request()->method() == 'PUT' ? $this->updateRequest() : $this->storeRequest();
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages()
    {
        return [
            'name.required' => 'يجب ادخال اسم',
        ];
    }
}
