<?php

namespace Site\Interfaces;

/**
 * Interface IRedirector
 * @package Site\Interfaces
 */
interface IRedirector
{
    /**
     * @param string $url
     */
    public static function redirect(string $url = ''): void;
}