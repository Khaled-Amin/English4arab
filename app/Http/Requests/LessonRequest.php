<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'title' => 'required|min:1',
            'desk' => 'required|min:1',
            'body' => 'required|min:1',
            'link' => 'required|url',
            'type' => 'required|min:1',
            'section_id' => 'required|exists:App\Models\Section,id',
            'index' => 'required|numeric',
        ];
    }
}
