<?php

namespace Site;

use Site\Interfaces\IDB;

/**
 * Class DB
 * @package Site
 */
class DB implements IDB
{
    /**
     * @var $instance
     */
    private static $instance;
    /**
     * DB constructor.
     */
    private function __construct() {}
    /**
     *
     */
    private function __clone() {}
    /**
     * @return mixed|null
     */
    public static function getInstance() {
        if(empty(self::$instance)) {
            try {
                // Create connection
                $conn = mysqli_connect('testtest_db_1', 'root', 'root', 'test');
                // Check connection
                if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
                self::$instance = $conn;
            } catch(\Exception $error) {
                echo $error->getMessage();
            }
        }
        return self::$instance;
    }
}