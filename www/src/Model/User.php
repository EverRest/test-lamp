<?php

namespace Site\Model;

use Site\DB;
use Site\Helper\Redirector;
use Site\Helper\Sanitizer;
use Site\Interfaces\IDB;
use Site\Interfaces\IModel;

/**
 * Class User
 * @package Site\Model
 */
class User implements IModel
{
    protected $conn;
    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->conn = DB::getInstance();
    }
    /**
     * @var string
     */
    public $table = 'User';
    /**
     * @param int $id
     * @return mixed
     */
    public function get(int $id = 0)
    {
        $query = sprintf("SELECT * FROM `%s` WHERE `id`=%s LIMIT 1;", $this->table, $id);
        $result = $this->conn->query($query);
        $user = $result->fetch_assoc();

        return $user;
    }

    /**
     * @return mixed
     */
    public function lastInsertedId()
    {
        $query = sprintf("SELECT id FROM %s ORDER BY id DESC LIMIT 1;", $this->table);
        $result = $this->conn->query($query);
        $id = $result->fetch_assoc()['id'];

        return $id;
    }
    /**
     * @return mixed
     */
    public function list()
    {
        $query = sprintf("SELECT * From %s ORDER BY id ASC;", $this->table);
        $result = mysqli_query($this->conn, $query);
        $users = $result->fetch_all(MYSQLI_ASSOC);

        return $users;
    }

    /**
     * @param array $params
     * @return mixed|void
     */
    public function add(array $params = [])
    {
        $name = isset($params['name'])&!empty($params['name'])?
            Sanitizer::sanitizeString($params['name']): random_bytes(25);
        $email = isset($params['email'])&!empty($params['email'])?
            Sanitizer::sanitizeEmail($params['email']): sprintf("%s@%s.com", random_bytes(25), random_bytes(25));
        // prepare and bind
        $query = sprintf("INSERT INTO `%s` (name, email) VALUES (?, ?)", $this->table);
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss",$name, $email);

        if($stmt->execute()) {
            return $this->get((int) $this->lastInsertedId());
        } else {
            $stmt->close();
            return [];
        }
    }
}