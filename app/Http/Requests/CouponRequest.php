<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'section_ids' => 'required|array|min:1',

            'section_ids.*' => 'required|exists:App\Models\Section,id',
            'key' => 'required|min:5|unique:App\Models\Coupon',

            'number' => 'required|numeric',

        ];
    }
}
