<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostSaveRequest extends FormRequest
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
            'user_id'=>'required|integer',
            'title'=>'required|max:255',
            'content'=>'required',
            'category_id'=>'required|integer',
            'tag_id'=>'required|array|min:1',
            'published'=>'required',
        ];
    }
}
