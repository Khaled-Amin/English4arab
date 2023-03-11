<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{

    protected $table = "sections";

    protected $fillable  = [
        'title',
        'slug',
        'desk',
        'body',
        'image'
    ];


    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function getlessonsPaginationAttribute()
    {
        return $this->lessons()->paginate();

    }

    
    


    public function auth()
    {
        if( auth()->check()  || in_array($this->id , getSectionIds())){
            return true;
        }   
        return false;
    }


    public function getImageUrlAttribute()
    {
        return $this->image? Storage::disk('images')->url($this->image) : Storage::disk('images')->url('blank.png');

    }


    public function getRouteKeyName() {
        return 'slug';
    }
}
