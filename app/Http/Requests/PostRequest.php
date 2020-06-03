<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'bail|required|max:50',
            'post_content' => 'required|min:10|max:500',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Title không để trống',
            'title.max'=> 'Title không quá 50 ký tự',
            'post_content.required' => 'Post content không để trống',
            'post_content.min' => 'Post content ít nhất 10 ký tự',
            'post_content.max' => 'Post content tối đa 500 ký tự ',
        ];
    }
}