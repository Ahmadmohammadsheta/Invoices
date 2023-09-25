<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
{
    /**
     * store validations
     */
    private function storeRequest()
    {
        return [
            'name' => 'required| unique:sections',
            'description' => 'nullable',
        ];
    }

    /**
     * update validations
     */
    private function updateRequest()
    {
        // return dd($this->id);
        return [
            // 'name' => 'required| unique:sections,name,'.$this->id,  //AMA.true
            'name' => [
                'required', Rule::unique('sections', 'name')->ignore($this->id)
            ], //AMA>true
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
