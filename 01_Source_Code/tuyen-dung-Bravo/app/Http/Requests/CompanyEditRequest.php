<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyEditRequest extends FormRequest
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
            'name'=>'required|max:255|min:2|regex:/^[a-zA-Z]+$/u',
            'surname'=>'required|max:255|min:2|regex:/^[a-zA-Z]+$/u',
            'email' => 'required|max:255|min:5|unique:users,email,' . auth()->user()->id,
            'about' => 'max:2000',
            'business_name'=>'required|max:255|min:2',
            'industry'=>'nullable|max:255|min:2',
            'capacity'=>'nullable|max:255|min:2',
            'address'=>'nullable|max:255|min:2',
            'tel'=>'nullable|numeric|digits_between:7,12',
            'website'=>'nullable|max:255|min:2',
            'linkedin' => 'nullable|max:255|min:2',
            'facebook' => 'nullable|max:255|min:2',


        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name must be filled in.',
            'name.max' => 'The name must have a maximum of 255 characters.',
            'name.min' => 'Name must have at least 2 characters.',
            'surname.required' => 'Surname must be filled in.',
            'surname.max' => 'Surname must have a maximum of 255 characters.',
            'surname.min' => 'Last name must have at least 2 characters.',
            'email.required' => 'Email must be filled in.',
            'email.max' => 'Email must have a maximum of 255 characters.',
            'email.min' => 'Email must have a minimum of 5 characters.',
            'email.unique' => 'This email is being used by another user.',
            'about.max' => 'Bio must have a maximum of 255 characters.',
            'business_name.required' => 'Company must be filled in.',
            'business_name.max' => 'Company must have a maximum of 255 characters.',
            'business_name.min' => 'Company must have at least 2 characters.',
            'industry.required' => 'Industry must be filled in.',
            'industry.max' => 'Industry must have a maximum of 255 characters.',
            'industry.min' => 'Industry must have at least 2 characters.',
            'capacity.required' => 'Capacity must be filled in.',
            'capacity.max' => 'Capacity must have a maximum of 255 characters.',
            'capacity.min' => 'Capacity must have a minimum of 2 characters.',
            'address.required' => 'Address must be filled in.',
            'address.max' => 'Address must have a maximum of 255 characters.',
            'address.min' => 'Address must have at least 2 characters.',
            'tel.required' => 'Phone must be filled in.',
            'tel.max' => 'The phone must have a maximum of 255 characters.',
            'tel.min' => 'Phone must have at least 2 characters.',
            'tel.numeric' => 'Phone must be numeric characters.',
            'website.required' => 'Website must be filled in.',
            'website.max' => 'Website must have a maximum of 255 characters.',
            'website.min' => 'Website must have at least 2 characters.',
            'linkedin.max' => 'LinkedIn must have a maximum of 255 characters.',
            'linkedin.min' => 'LinkedIn must have a minimum of 2 characters.',
            'facebook.max' => 'Facebook must have a maximum of 255 characters.',
            'facebook.min' => 'Facebook must have a minimum of 2 characters.',

        ];
    }
}
