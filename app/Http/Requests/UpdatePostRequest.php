<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title'=>"required|min:3|unique:posts,title,{$this->post}",
            'description'=>'required|min:10',
            'user_id'=>'exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title input is Empty , please fill it.',
            'description.required'  => 'Description  is required , please write it.',
            'user_id.exists' => 'This user is invalid'
        ];
    }
}
