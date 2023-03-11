<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Lesson extends Model
{
    protected $table = "lessons";
    protected $with = ['section'];
    
    protected $fillable  = [
        'title',
        'desk',
        'body',
        'link',
        'type',
        'section_id',
        'index',
        'image'
    ];

    public function section()
    {
        return $this->belongsTo(Section::class , 'section_id');
    }


    public function getImageUrlAttribute()
    {
        return $this->image? Storage::disk('images')->url($this->image) : Storage::disk('images')->url('blank.png');

    }


    
    public function getRouteKeyName() {
        return 'id';
    }

}
