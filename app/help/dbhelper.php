<?php 
#define
use \App\Setting as setting;
use \App\Contact as contact;

#functions
if(! function_exists('getSettings')){
    function getSettings($name = 'site_title')
    {
        $setting=setting::where('name',$name)->first();
        return $setting == null ? $name : $setting->real_value;
    }
}


if(! function_exists('getContact')){
    function getContact($type = 'data')
    {
        if($type == 'data')
        {
            return $contact = Contact::where('status',0)->orderBy('Created_at','desc')->get();
        }else
        {
            return $contact = Contact::where('status',0)->count();
        }
        return $contact ;
    }
}


?>