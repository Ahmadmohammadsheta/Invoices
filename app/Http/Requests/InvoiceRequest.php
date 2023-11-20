<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * store validations
     */
    private function storeRequest()
    {
        return [
            'invoice_number' => 'required',
            'invoice_date' => 'nullable',
            'due_date' => 'nullable',
            'invoice_type' => 'required',
            'product_id' => 'required',
            'amount_collection' => 'required',
            'amount_commission' => 'required',
            'discount' => 'required',
            'value_vat' => 'required',
            'rate_vat' => 'required',
            'total' => 'required',
            'status' => 'nullable',
            'value_status' => 'nullable',
            'note' => 'nullable',
            'payment_Date' => 'nullable',
            'img' => 'nullable',
        ];
    }

    /**
     * update validations
     */
    private function updateRequest()
    {
        return [
            'invoice_number' => 'required',
            'invoice_date' => 'nullable',
            'due_date' => 'nullable',
            'invoice_type' => 'required',
            'product_id' => 'required',
            'amount_collection' => 'required',
            'amount_commission' => 'required',
            'discount' => 'required',
            'value_vat' => 'required',
            'rate_vat' => 'required',
            'total' => 'required',
            'status' => 'nullable',
            'value_status' => 'nullable',
            'note' => 'nullable',
            'payment_Date' => 'nullable',
            'img' => 'nullable',
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
            'section_id.required' => 'يجب اختيار القسم',
            'product_id.required' => 'يجب اختيار المنتج',
        ];
    }
}
