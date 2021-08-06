<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class BlogCategoryRequest extends FormRequest
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
            'name' => [
                "required",
                "max:255",
                Rule::unique('blog_category')->ignore($this->blog_category),
            ],
            'short_description' => 'nullable',
            'long_description' => 'nullable',
            'image' => 'nullable | mimes:jpeg,jpg,png | max:2048',
        ];

        return $result;
    }
}
