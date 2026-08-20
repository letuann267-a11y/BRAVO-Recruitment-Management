<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreCategoriesRequest extends FormRequest
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
            'name'=>'required|min:2|max:255'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Category must be filled',
            'name.min'=>'The category must have a minimum of 2 characters.',
            'name.max'=>'The category must have a maximum of 255 characters.',
        ];
    }
}
