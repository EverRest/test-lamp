<?php

namespace Site;

use Site\Interfaces\IController;

/**
 * Class Controller
 * @package Site
 */
abstract class Controller implements IController
{
    /**
     * @return void
     */
    public abstract function listAction():void;
    /**
     * @return void
     */
    public abstract function getAction():void;

    /**
     * @return void
     */
    public abstract function postAction():void;

    /**
     * @return void
     */
    public abstract function notFoundAction():void;
}