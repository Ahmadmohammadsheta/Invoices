<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * store validations
     */
    private function storeRequest()
    {
        return [
            'name' => 'required| unique:products',
            'en_name' => 'required| unique:products',
            'code' => 'nullable| unique:products',
            'barecode' => 'nullable| unique:products',
            'section_id' => 'required',
            'unit_id' => 'required',
            'total_units' => 'required',
            'price' => 'required',
            'selling_discount' => 'nullable',
            'buying_discount' => 'nullable',
            'tax' => 'nullable',
            'description' => 'nullable',
        ];
    }

    /**
     * update validations
     */
    private function updateRequest()
    {
        return [
            'name' => ['required', Rule::unique('products', 'name')->ignore($this->id)], //AMA>true
            'en_name' => ['required', Rule::unique('products', 'en_name')->ignore($this->id)], //AMA>true
            'code' => ['required', Rule::unique('products', 'code')->ignore($this->id)], //AMA>true
            'barecode' => ['required', Rule::unique('products', 'barecode')->ignore($this->id)], //AMA>true
            'section_id' => 'required',
            'unit_id' => 'required',
            'total_units' => 'required',
            'price' => 'required',
            'selling_discount' => 'nullable',
            'buying_discount' => 'nullable',
            'tax' => 'nullable',
            'description' => 'nullable',
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
            'name.unique' => 'موجود من قبل',
            'description.required' => 'يجب ادخال وصف',
        ];
    }
}

