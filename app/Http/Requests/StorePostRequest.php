<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title' => 'required|max:100|min:3|unique:posts,title,'.$this->postId,
            'desc' => 'required|min:10',
            'author' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'title.min' => 'Title is too short',
            'title.unique' => 'Title is already taken',
            'desc.required' => 'Description is required',
            'author.required' => 'Author is required',
            'photo.mimes'=>'Upload a valid image: jpg, png, jpeg',
            'photo.image'=>'Not an image',
            'photo.max'=>'Image size cannot exceed 2MB',
        ];
    }
}
