<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsFormRequest extends FormRequest
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
            'title' => 'required|unique:posts|min:4',
            'slug' => 'required|unique:posts|min:3',
            'body' => 'required|min:5',
            'category_id' => 'required',
            'published_at' => 'nullable|date_format:Y-m-d H:i:s'
        ];
    }
}
