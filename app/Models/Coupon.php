<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Coupon extends Model
{
    protected $table = "coupon";
    protected $with = ['sections'];
    protected $fillable  = [
        'key',
        'number',
        'status'
    ];
     
    public function sections()
    {
        return $this->belongsToMany(Section::class , 'coupon_sections'  );
    }

    public function users()
    {
        return $this->hasMany(CouponUser::class  );
    }


    public function sectionsIds()
    {
        return $this->sections->pluck('id')->toArray();
    }


    public function getRouteKeyName() {
        return 'key';
    }
}