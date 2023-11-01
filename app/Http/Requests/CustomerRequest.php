<?php

namespace App\Http\Requests;
use Carbon\Carbon;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    /**
     * store validations
     */
    private function storeRequest()
    {
        return [
            'name' => 'required| unique:customers',
            'national_id' => 'nullable|unique:customers,national_id|regex:/^[0-9]{14}$/',
            'age' => 'required|date|before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
            'phone1' => 'required|unique:customers,phone1|regex:/^(01)[0-9]{9}$/' . ($this->id ? ",$this->id" : ''),
            'email' => 'nullable| unique:customers',
            'type' => 'required',
            'phone3' => 'nullable',
            'phone2' => 'nullable',
            'national_id_image' => 'nullable',
            'approved' => 'nullable',
        ];
    }

    /**
     * update validations
     */
    private function updateRequest()
    {
        return [
            // 'name' => 'required| unique:customers,name,'.$this->id,  //AMA.true
            'name' => ['required', Rule::unique('customers', 'name')->ignore($this->id)], //AMA>true
            'national_id' => ['required', Rule::unique('customers', 'national_id')->ignore($this->id)], //AMA>true
            'email' => ['required', Rule::unique('customers', 'email')->ignore($this->id)], //AMA>true
            'phone1' => [
                'required', 'regex:/^(01)[0-9]{9}$/',
                Rule::unique('customers', 'phone1')->ignore($this->id)
            ],
            'age' => 'required|date|before_or_equal:'.\Carbon\Carbon::now()->subYears(18)->format('Y-m-d'),
            'type' => 'required',
            'phone3' => 'nullable',
            'phone2' => 'nullable',
            'national_id_image' => 'nullable',
            'approved' => 'nullable',
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
            'name.unique' => 'Name already_exists',
            'national_id.unique' => 'National id already_exists',
            'email.unique' => 'Email already_exists',
            'phone1.unique' => 'Phone already_exists',
            'national_id_image.required' => 'national_id_image required',
        ];
    }
}
