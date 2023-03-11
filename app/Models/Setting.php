<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Setting extends Model
{
    protected $table ="system_settings";
    protected $fillable =[ 'key' ,  'title' , 'value' , 'type' , 'options'];
    public $timestamps = false;


    protected $casts =[
        'options' =>'array',
    ];

    public function toArray()
    {
        return [
            'title' => $this->title  ,
            'value' => $this->value ,
            'type' => $this->type ,
            'key' => $this->key  ,
            'id' => $this->id,
            ];
    }
    public function getvaluesAttribute($key)
    {
        switch ($this->type){
            case 'array':
                $arr = json_decode($this->value);
                return is_array($arr) ? $arr : [] ;
            case 'file':
                return env('IMG_URL') .$this->value;
        }
        return $this->value;
    }
}
