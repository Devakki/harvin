<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OrganizationRequest extends FormRequest
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
           'image' => 'nullable | mimetypes:image/jpeg,image/png,image/jpg',   
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
