<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CouponSection extends Model
{
    protected $table = "coupon_sections";

    protected $fillable  = [
        'section_id',
        'coupon_id',
    ]; 


    public function coupon()
    {
        return $this->belongsTo(Coupon::class , 'coupon_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class , 'section_id');
    }
 }