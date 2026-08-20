<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobStoreRequest extends FormRequest
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
            'title'=>'required|max:255|min:2',
            'body'=>'required|max:2000|min:2',
            'address'=>'required|max:255|min:2',
            'job_type'=>'required|numeric|in:1,2,3',
            'experience'=>'required|numeric|min:0|max:3',
            'category_id' => 'required|numeric',
            'language_id' => 'required|numeric',
            'language_level' => 'required|string',
            'province_id' => 'required|numeric',
            'gender' => 'required|numeric|in:1,2,3',
            'startingAge' => 'required|numeric',
            'endingAge' => 'required|numeric',
            'duties'=>'required|max:2000|min:2',
            'startingDate'=>'required|max:255|min:2',
            'price_type'=>'required|numeric|max:2|min:1',
            'price'=>'required|max:255|min:2'
        ];
    }
    public function messages(){
        return [
            'job_type.max' => 'Job type must be selected.',
            'job_type.min' => 'Job type must be selected.',
            'experience.max' => 'Experience must be selected.',
            'experience.min' => 'Experience must be selected.',
            'website.max' => 'Website must have a maximum of 255 characters.',
            'website.min' => 'Website must have at least 2 characters.',

        ];
    }
}
