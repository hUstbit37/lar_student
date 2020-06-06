<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'username' => 'bail|required|alpha|unique:member',
            'password' => 'required|min:8|max:30',
            'password_confirm' => 'required|same:password',
            'email' => 'required|unique:member'
        ];
    }

    public function message()
    {
        return [
            'username.unique' => 'Username đã tồn tại',
            'username.required' => 'Username không để trống',
            'username.alpha' => 'Username chỉ chứa các chữ cái',
            'email.required' => 'Email không để trống',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Password không để trống',
            'password.min' => 'Password ít nhất 8 ký tự',
            'password.max' => 'Password tối đa 30 ký tự ',
            'password_confirm.required' => 'Password confirm không để trống',
            'password_confirm.same' => 'Password nhập lại không trùng khớp',
        ];
    }
}