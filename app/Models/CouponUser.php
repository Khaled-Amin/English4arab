<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CouponUser extends Model
{
    protected $table = "coupon_users";

    protected $fillable  = [
        'coupon_id',
        'visitor_id',
    ]; 

    public function coupon()
    {
        return $this->belongsTo(Coupon::class , 'coupon_id');
    }
 }