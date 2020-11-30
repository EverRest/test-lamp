<?php

namespace Site\Interfaces;

/**
 * Interface IModel
 * @package Site\Interfaces
 */
interface IModel
{
    /**
     * @param array $params
     * @return mixed
     */
    public function add(array $params = []);

    /**
     * @return mixed
     */
    public function list();

    /**
     * @return mixed
     */
    public function get(int $id = 0);

    /**
     * @return mixed
     */
    public function lastInsertedId();
}