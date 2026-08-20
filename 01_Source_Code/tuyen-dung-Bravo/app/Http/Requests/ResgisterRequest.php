<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResgisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z]+$/'],
            'surname' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z0-9]+$/'],
            'is_business' => ['required', 'numeric', 'min:0', 'max:1'],
            'username' => ['required', 'string', 'min:3', 'max:255', 'unique:users', 'regex:/^[A-Za-z0-9]+$/'],
            'about' => ['nullable', 'string', 'min:3', 'max:2000'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'birthday' => ['required'],
            'province_id' => ['required' ],
            'gender' => ['required' ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8'],
            'category_id' => ['required_if:is_business,0', 'nullable', 'numeric'],
            'business_name' => ['required_if:is_business,1', 'nullable', 'string', 'min:2', 'max:255'],
            'industry' => ['nullable', 'string', 'min:2', 'max:255'],
            'capacity' => ['nullable', 'string', 'min:2', 'max:255'],
            'address' => ['nullable', 'string', 'min:2', 'max:255'],
            'certificate' => ['nullable', 'string', 'max:255'],
            'phone_number' => ['nullable', 'string', 'min:10', 'max:11'],
            'tel' => ['nullable', 'string', 'min:2', 'numeric', 'digits_between:7,12'],
            'website' => ['nullable', 'string', 'min:2', 'max:255'],
            'language_id.*' => ['nullable', 'nullable', 'numeric'],
            'level.*' => ['nullable', 'nullable'],
        ];
    }
}
