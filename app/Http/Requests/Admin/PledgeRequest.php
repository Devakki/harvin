<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

class PledgeRequest extends FormRequest
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
        $result = [ 
            'title' => 'required | max:255',  
            'short_description' => 'nullable',  
            'long_description' => 'nullable',  
            'image' => 'nullable | mimes:jpeg,jpg,png',   
            'companies' => 'nullable',  
        ];

        return $result;
    }
}
