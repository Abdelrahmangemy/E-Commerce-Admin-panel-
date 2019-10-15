<?php 

    if(function_exists('showImage'))
    {
        function showImage($link ,$width='100px',$height='100px')
        {
            return ' <img src="'.$link.'" style="width:'.$width.';height:'.$height.' " />';
        }
    }

?>