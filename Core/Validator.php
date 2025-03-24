<?php

namespace Core;

class Validator {
    public static function string($value, $min = 1, $max = INF)
    {
        $trimmed = trim($value);
        // dd(empty($trimmed));
        if (empty($trimmed)) {
            return false;
        }
        
        $cnt = strlen($trimmed);
        return $cnt >= $min && $cnt <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}