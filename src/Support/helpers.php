<?php

if(!function_exists('fieldNameToDot')) {
    function fieldNameToDot($name)
    {
        $parts = explode('[', $name);
        $levels = [];

        foreach($parts as $key => $val) {
            if(strlen($val) === 0) {
                $levels[] = $key;
                continue;
            }

            $levels[] = rtrim($val, ']');
        }

        return implode('.', $levels);
    }
}
