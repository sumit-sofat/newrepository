<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'first_name' => 'required|Min:3',
            'last_name' => 'required|Min:3',
            'mobile_number' => 'required|unique:contacts,mobile_number,' . $this->contact,
            'address' => 'required',
            // 'image' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required.',
            'last_name.required' => 'Last Name is required.',
            'first_name.min' => 'Name should minimum 3 chracters.',
            'last_name.min' => 'Name should minimum 3 chracters.',
            'mobile_number.required' => 'Mobile Number is required.',
            'mobile_number.unique:contacts' => 'Mobile Number should unique.',
            'address.required' => 'Address is Required.',
            // 'image.required' => 'image is Required.',

        ];
    }
}
