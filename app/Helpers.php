<?php

use App\Models\Settings;

if(!function_exists('Settings')){
    function Settings($key)
    {
        $settings = Settings::where('key',$key)->first();
        return $settings->value;
    }
}

if(!function_exists('ArrayToStr')){
    function ArrayToStr($array)
    {
        $a = ["High Performance "," Supuer Fast."];

        $str = implode(',',$a);
        return $str;
    }
}