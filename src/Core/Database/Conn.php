<?php

/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 23/06/16
 * Time: 14:17
 */

namespace Core\Database;

use PDO;

class Conn
{
    private $host;
    private $dbname;
    private $user;
    private $password;
    /**
     * @var PDO
     */
    private $conn;

    /**
     * Conn constructor.
     * @param $host
     * @param $dbname
     * @param $user
     * @param $password
     */
    public function __construct($host = "localhost", $dbname = "crudphp", $user = "root", $password = ";;")
    {
        $this->host = (string) $host;
        $this->dbname = (string) $dbname;
        $this->user = (string) $user;
        $this->password = (string) $password;
        
        try {
            $this->conn = new PDO("mysql:host={$host};dbname={$dbname};", "{$user}", "{$password}");
        } catch (\PDOException $e) {
            echo "Erro na linha: {$e->getLine()}.<br/> Mensagem: {$e->getMessage()}";
        }
    }

    public function getConn()
    {
        return $this->conn;
    }


}