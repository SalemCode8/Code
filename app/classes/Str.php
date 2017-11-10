<?php

/**
 * Created by PhpStorm.
 * User: salemcode8
 * Date: 11/10/17
 * Time: 4:52 PM
 */
class Str
{
    /**
     * @param String $haystack String Want to Search In
     * @param String $needle   String To Use in search
     * @return bool
     */
    public static function startsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }
    /**
     * @param String $haystack String Want to Search In
     * @param String $needle   String To Use in search
     * @return bool
     */
    public static function endsWith($haystack, $needle)
    {
        $length = strlen($needle);
        return $length === 0 ||
        (substr($haystack, -$length) === $needle);
    }
}