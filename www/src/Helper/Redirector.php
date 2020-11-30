<?php

namespace Site\Helper;

use Site\Interfaces\IRedirector;

/**
 * Class Redirector
 * @package Site\Helper
 */
final class Redirector implements IRedirector
{
    /**
     * @const string
     */
    const BASIC_URL = "Location: http://loc.test/%s";

    /**
     * @param string $url
     */
    public static function redirect(string $url = ''): void
    {
        header("HTTP/1.1 301 Moved Permanently");
        header(sprintf(self::BASIC_URL, $url));
    }
}