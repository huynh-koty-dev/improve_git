<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class RegisterRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],
            'name' => [
                'required',
                'regex:/(^([a-zA-Z]+)(\d+)?$)/u',
                'max:30',
            ],
            'password' => [
                'required',
                'min:8',
                'max:30',
                'regex:/(^([a-zA-Z]+)(\d+)?$)/u',
            ], 
            'repassword' => 'required|same:password',
        ];
    }

    public function messages()
    {   
        return [
            'email.required' => __('request.email_required'),
            'email.email' => __('request.email_email'),
            'password.required' => __('request.pass_required'),
            'password.min' => __('request.pass_min'),
            'password.max' => __('request.pass_max'),
            'password.regex:/(^([a-zA-Z]+)(\d+)?$)/u' => __('request.pass_regex'),
            'email.unique:users,email' => __('request.email_exist'),
            'name.required' => __('request.name_required'),
            'name.regex:/(^([a-zA-Z]+)(\d+)?$)/u' => __('request.name_regex'),
            'name.max' => __('request.name_max'),
            'repassword.required' => __('request.repass_required'),
            'repassword.same:password' => __('request.repass_same'),
        ];
    }   
}
