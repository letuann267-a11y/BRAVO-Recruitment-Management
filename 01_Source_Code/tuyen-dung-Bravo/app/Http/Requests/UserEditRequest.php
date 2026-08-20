<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'phone_number' => 'nullable|string|max:11|min:10',
            'birthday' => ['required'],
            'province_id' => ['required' ],
            'linkedin' => 'nullable|max:255|min:2',
            'facebook' => 'nullable|max:255|min:2',
            'cv'=>'mimes:pdf|max:10240',
            'language_id' => 'nullable','numeric',
            'language_id.*' => 'nullable','numeric',
            'level.*' => 'nullable'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Name must be filled in.',
            'name.max' => 'The name must have a maximum of 255 characters.',
            'name.min' => 'Name must have at least 2 characters.',
            'surname.required' => 'Surname must be filled in.',
            'surname.max' => 'Last name must have a maximum of 255 characters.',
            'surname.min' => 'Surname must have at least 2 characters.',
            'email.required' => 'Email must be filled in.',
            'email.max' => 'Email must have a maximum of 255 characters.',
            'email.min' => 'Email must have a minimum of 5 characters.',
            'email.unique' => 'This email is being used by another user.',
            'about.max' => 'About must have a maximum of 255 characters.',
            'cv.mimes' => 'CV must be in PDF format.',
            'cv.max' => 'CV size must be a maximum of 10MB.',
            'linkedin.max' => 'LinkedIn must have a maximum of 255 characters.',
            'linkedin.min' => 'LinkedIn must have a minimum of 2 characters.',
            'facebook.max' => 'Facebook must have a maximum of 255 characters.',
            'facebook.min' => 'Facebook must have a minimum of 2 characters.',

        ];
    }
}
