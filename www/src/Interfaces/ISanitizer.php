<?php

namespace Site\Interfaces;

/**
 * Interface ISanitizer
 * @package Site\Interfaces
 */
interface ISanitizer
{
    /**
     * @param string $str
     * @return string
     */
    public static function sanitizeString(string $str = ''):string;

    /**
     * @param string $email
     * @return string
     */
    public static function sanitizeEmail(string $email = ''):string;
}