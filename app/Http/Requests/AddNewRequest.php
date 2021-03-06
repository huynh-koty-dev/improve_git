<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewRequest extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {   
        return [
            'title.required' => __('request.title_required'),
            'content.required' => __('request.content_required'),
        ];
    }   
}
