<?php

namespace Site\Helper;

use Site\Interfaces\ISanitizer;

/**
 * Class Sanitizer
 * @package Site\Helper
 */
final class Sanitizer implements ISanitizer
{
    /**
     * @param string $str
     * @return string
     */
    public static function sanitizeString(string $str = ''):string
    {
        return filter_var($str, FILTER_SANITIZE_STRING);
    }

    /**
     * @param string $email
     * @return string
     */
    public static function sanitizeEmail(string $email = ''):string
    {
        return filter_var($email, FILTER_SANITIZE_EMAIL);
    }
}