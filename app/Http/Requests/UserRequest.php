<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'             =>  'required|min:3|max:191',
            'email'                 =>  'required|email|unique:users,id,' . auth()->id(),
            'password' => 'same:confirm-password',
            'image'        =>  'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'

        ];
    }
}
