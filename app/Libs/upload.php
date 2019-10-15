<?php 
namespace App\Libs;

class upload
{
    public function singleImage($name ,$path = null)
    {
        $filename = '' ;
        $path = $path == null ? $this->makePath() : $path ; 
        if(request()->hasfile($name))
        {
            $filename = request()->file($name)->store($path);
        }
        return $filename;
    }

    private function makePath($type = 'image')
    {
        $year  = date("Y");
        $month = date("m");
        $day   = date("d");
        return $type . '/' . $year . '/' . $month . '/' . $day ;
    }
}