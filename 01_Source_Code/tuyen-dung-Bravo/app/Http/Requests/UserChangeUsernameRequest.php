<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserChangeUsernameRequest extends FormRequest
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
            'username' => ['required', 'string','min:3', 'max:255','regex:/^[A-Za-z0-9]+$/', 'unique:users']
        ];
    }
    public function messages(){
        return [
            'username.required' => 'Username must be filled in.',
            'username.max' => 'Username must have a maximum of 255 characters.',
            'username.min' => 'Username must have a minimum of 3 characters.',
            'username.string' => 'Username must be in letters.',
            'username.regex' => 'Username must contain letters A-Z and numbers 0-9.',
            'username.unique' => 'Username is being used by another user.',

        ];
    }
}
