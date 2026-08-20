<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserChangePasswordRequest extends FormRequest
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
            'current_password'     => 'required',
            'password'     => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ];
    }
    public function messages(){
        return [
            'current_password.required' => 'Please enter the current password.',
            'password.required' => 'Please enter a new password.',
            'password.min' => 'New password must be at least 8 characters long.',
            'password_confirmation.required' => 'Please re-enter the new password.',
            'password_confirmation.same' => 'Passwords do not match.',

        ];
    }
}
