<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SetCouponRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'key' => 'required|exists:App\Models\Coupon,key',
            'section' => 'required|exists:App\Models\Section,slug',
            'visitor_id' => 'required|string'
        ];
    }
}
