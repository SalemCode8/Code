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
     * @param string $haystack String Want to Search In
     * @param string $needle   String To Use in search
     * @return bool
     */
    public static function startsWith(string $haystack, string $needle): bool
    {
        $length = strlen($needle);
        return (substr($haystack, 0, $length) === $needle);
    }
    /**
     * @param string $haystack String Want to Search In
     * @param string $needle   String To Use in search
     * @return bool
     */
    public static function endsWith(string $haystack, string $needle): bool
    {
        $length = strlen($needle);
        return $length === 0 ||
        (substr($haystack, -$length) === $needle);
    }
}