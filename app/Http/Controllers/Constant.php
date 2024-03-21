<?php

namespace App\Http\Controllers;

class Constant
{
    public static function status($index)
    {
        $status = [0=>'Inactive', 1=>'Active'];
        if($index){
            return $status[$index];
        }
        return $status;
    }
}
