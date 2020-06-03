<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class loginRequest extends FormRequest
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
            'username' => 'bail|required|alpha',
            'password' => 'required|min:8|max:30',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username không để trống',
            'username.alpha' => 'Username chỉ chứa các chữ cái',
            'password.required' => 'Password không để trống',
            'password.min' => 'Password ít nhất 8 ký tự',
            'password.max' => 'Password tối đa 30 ký tự ',
        ];
    }
}
