<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    protected $table = 'Sliders';
    protected $fillable = [
        'title','image',
    ];

    public function getPhotoAttribute()
    {
        return \Storage::url($this->image) ;
    }  
}
