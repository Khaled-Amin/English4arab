<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SectionRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'slug' => 'required|unique:sections,id',
            'title' => 'required|min:1',
            'desk' => 'required|min:1',
            'body' => 'required|min:1',
        ];
    }
}
