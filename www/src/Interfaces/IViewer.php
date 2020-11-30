<?php

namespace Site\Interfaces;

/**
 * Interface IViewer
 */
interface IViewer
{
    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key = '');
    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);

    /**
     * @param string $tpl
     * @return mixed
     */
    public function setTpl(string $tpl = '');

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name = '');

    /**
     * Render template
     */
    public function render(): void;
}