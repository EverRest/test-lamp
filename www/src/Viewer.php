<?php

namespace Site;

use Site\Interfaces\IViewer;

/**
 * Class Viewer
 * @package Site
 */
class Viewer implements IViewer
{
    /**
     * @const string
     */
    const TPL_PATH = "/../views/%s.php";
    /**
     * @var string
     */
    protected $viewPath = "";
    /**
     * Viewer constructor.
     */
    public function __construct()
    {
        $this->viewPath = __DIR__ . self::TPL_PATH;
    }
    /**
     * @var string
     */
    protected $_file;
    /**
     * @var array
     */
    protected $_data = array();

    /**
     * @param $key
     * @param $value
     * @return mixed|void
     */
    public function set($key, $value)
    {
        $this->_data[$key] = $value;
    }

    /**
     * @param string $tpl
     * @return mixed|void
     */
    public function setTpl(string $tpl = '')
    {
        $this->_file = $tpl;
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function get(string $key = '')
    {
        return $this->_data[$key];
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name = '')
    {
        if (array_key_exists($name, $this->_data)) {
            return $this->_data[$name];
        }
        return '';
    }

    /**
     * @throws \Exception
     */
    public function render():void
    {
        $full_path = sprintf( $this->viewPath, $this->_file);
        if (!file_exists($full_path))
        {
            throw new \Exception("Template " . $this->_file . " doesn't exist.");
        }

        extract($this->_data);
        ob_start();
        $this->build();
        include($full_path);
        $this->build("footer");
        $output = ob_get_contents();
        ob_end_clean();
        echo $output;
    }

    /**
     * @param string $content
     */
    protected function build(string $content = "header"):void
    {
        include_once sprintf( $this->viewPath, $content);
    }
}