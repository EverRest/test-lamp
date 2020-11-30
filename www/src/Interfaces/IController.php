<?php
namespace Site\Interfaces;

interface IController
{
    /**
     *
     */
    public function listAction();
    /**
     * @return mixed
     */
    public function getAction();

    /**
     * @return mixed
     */
    public function postAction();

    /**
     * @return mixed
     */
    public function notFoundAction();
}