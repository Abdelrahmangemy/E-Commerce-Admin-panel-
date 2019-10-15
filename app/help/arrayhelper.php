<?php
if(! function_exists('roles')){
    function role($id = null)
    {
        $array = [
            trans('admin.user'),
            trans('admin.admin')
        ];
        return $id == NULL ? $array : $array[$id];
    }
}

if(! function_exists('status')){
    function status($id = null)
    {
        $array = [
            1 => trans('admin.active'),
            0 => trans('admin.inactive')
        ];
        return $id == NULL ? $array : $array[$id];
    }
}