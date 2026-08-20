<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserChangePhotoRequest extends FormRequest
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
            'photo_id'=>'required|mimes:jpeg,png,jpg,svg|max:10240'
        ];
    }
    public function messages(){
        return [
            'photo_id.required' => 'Please upload a photo.',
            'photo_id.mimes' => 'Please upload photos in format: jpeg, png, jpg and svg.',
            'username.max' => 'Image must be a maximum of 10MB.',

        ];
    }
}
