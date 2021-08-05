<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TeamRequest extends FormRequest
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
            'name' => 'required | max:255',  
            'profile' => 'nullable',  
            'short_description' => 'nullable',  
            'long_description' => 'nullable',  
            'linkedin' => 'nullable',  
            'email' => 'nullable',  
            'image' => 'nullable | mimes:jpeg,jpg,png',   
        ];

        /*switch($this->method())
        {
            case 'PUT':
            {
                $result['image'] = 'nullable | mimes:jpeg,jpg,png';                
            }
            default:break;
        }*/
            
        return $result;
    }
}
