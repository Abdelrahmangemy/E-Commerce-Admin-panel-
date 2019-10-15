<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class setting extends Model
{
    protected $table = 'settings';
    protected $fillable = [
       'name', 'title', 'value', 'type', 'options', 'sorting_number',
    ];

    public function getOptionAttribute(){
        $array = [];
        if($this->Attributes['options'] != null)
        {
            $array = explode(',',$this->Attributes['options']);
        }
        return $array ;
    }
    public function getrealValueAttribute(){
        $array = $this->options;
        return $array == [] ? $this->attributes['value'] : $array[$this->attributes['value']];
    }

    public function getTitleAttribute(){
        return trans('admin.'.$this->Attributes['title']);
    }
}
