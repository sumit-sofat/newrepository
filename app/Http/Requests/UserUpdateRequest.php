<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class UserUpdateRequest extends FormRequest
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
            'name' => 'required|min:3',
            'lastName' => 'required|min:3',
            'email' => 'email:rfc,dns'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'First Name is Required!',
            'name.min' => 'Name should minimum 3 chracters.',
            'lastName.required' => 'Last Name is Required!',
            'lastName.min' => 'Name should minimum 3 chracters.'
            
        ];
    }
}
