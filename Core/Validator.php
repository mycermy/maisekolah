<?php

class Validator {
    public static function string($value, $min = 1, $max = INF)
    {
        $cnt = strlen(trim($value));

        return $cnt >= $min && $cnt <= $max;
    }

    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}