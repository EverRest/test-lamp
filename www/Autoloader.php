<?php

/**
 * Class Autoloader
 */
final class Autoloader
{
    /**
     * @var array
     */
    protected $namespacesMap = array();

    /**
     * @param $namespace
     * @param $rootDir
     * @return bool
     */
    public function addNamespace($namespace, $rootDir)
    {
        if (is_dir($rootDir)) {
            $this->namespacesMap[$namespace] = $rootDir;
            return true;
        }

        return false;
    }

    /**
     * Class register
     */
    public function register()
    {
        spl_autoload_register(array($this, 'autoload'));
    }

    /**
     * @param $class
     * @return bool
     */
    protected function autoload($class)
    {
        $pathParts = explode('\\', $class);

        if (is_array($pathParts)) {
            $namespace = array_shift($pathParts);

            if (!empty($this->namespacesMap[$namespace])) {
                $filePath = $this->namespacesMap[$namespace] . '/' . implode('/', $pathParts) . '.php';
                require_once $filePath;
                return true;
            }
        }

        return false;
    }

}