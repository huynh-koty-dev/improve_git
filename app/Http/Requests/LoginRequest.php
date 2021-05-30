<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'email' => 'required|email',
            'password' => [
                'required',
                // 'min:8',
                // 'max:30',
                // 'regex:/[a-z]/',
                // 'regex:/[A-Z]/', 
                // 'regex:/[0-9]/',
            ], 
        ];
    }

    public function messages()
    {   
        return [
            'email.required' => __('request.email_required'),
            'email.email' => __('request.email_email'),
            'password.required' => __('request.pass_required'),
            // 'password.min' => __('request.pass_min'),
            // 'password.max' => __('request.pass_max'),
            // 'password.regex:/[a-z]/' => __('pass_lowercase_uppercase'),
            // 'password.regex:/[A-Z]/' => __('pass_lowercase_uppercase'),
            // 'password.regex:/[A-Z]/' => __('pass_number'),
        ];
    }   
}
