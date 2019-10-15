<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'user_id', 'name', 'slug', 'price', 'original_price', 'details', 'seo_desc', 'seo_keys', 'created_at', 'updated_at' 
    ];

    public function stocks()
    {
        return $this->hasMany('App\Stock');
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }    

    public function user()
    {
        return $this->belongsTO('App\User');
    }

    public function category()
    {
        return $this->belongsTO('App\Category');
    }
}
