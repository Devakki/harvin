<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
            'blog_category_id' => 'required | integer',  
            'name' => 'required | max:255',  
            'author_name' => 'required | max:255',
            'short_description' => 'nullable',  
            'long_description' => 'nullable',  
            'image' => 'nullable | mimes:jpeg,jpg,png | max:2048',   
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

    public function messages()
    {
        return [
            'image.max' => "Please upload maximum 2MB file.",
        ];
    }
}
