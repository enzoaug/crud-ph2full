<?php

/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 23/06/16
 * Time: 14:42
 */
namespace Application\Database;

use Core\Database;
use Core\Database\Conn;

class Instructions
{
    /**
     * @var Conn
     */
    private $conn;
    private $table;
    private $function;

    /**
     * Instructions constructor.
     * @param $table
     * @param $function
     * @throws \Exception
     */
    public function __construct($table, $function)
    {
        $this->conn = (object) new Database\Conn();
        $this->table = (string) $table;
        $this->function = (boolean) $function;
        switch ($function) {
            case "create":
                if (isset($_GET["do"]) && $_GET["do"] == "create") {
                    return $this->create();
                }
                break;
            case "update":
                if (isset($_GET["do"]) && $_GET["do"] == "update") {
                    return $this->update();
                }
                break;
            case "delete":
                if (isset($_GET["do"]) && $_GET["do"] == "delete") {
                    return $this->delete();
                }
                break;
            default:
                throw new \Exception("Não foi possível realizar a operação");
                break;
        }
    }

    public function create()
    {
        $query = "INSERT INTO {$this->table} (nome, preco, descricao) VALUES (:nome, :preco, :descricao)";
        $pdo = $this->conn->getConn();
        $create = $pdo->prepare($query);
        $create->bindValue(":nome", filter_input(INPUT_POST, "nome"));
        $create->bindValue(":preco", filter_input(INPUT_POST, "preco"));
        $create->bindValue(":descricao", filter_input(INPUT_POST, "descricao"));
        return $create->execute();
    }

    public function update()
    {
        $query = "UPDATE {$this->table} SET nome = :nome, preco = :preco, descricao = :descricao WHERE id = :id";
        $pdo = $this->conn->getConn();
        $update = $pdo->prepare($query);
        $update->bindValue(":nome", filter_input(INPUT_POST, "nome"));
        $update->bindValue(":preco", filter_input(INPUT_POST, "preco"));
        $update->bindValue(":descricao", filter_input(INPUT_POST, "descricao"));
        $update->bindValue(":id", filter_input(INPUT_POST, "id"));
        return $update->execute();
    }

    public function delete()
    {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $pdo = $this->conn->getConn();
        $delete = $pdo->prepare($query);
        $delete->bindParam(":id", $_GET["id"]);
        return $delete->execute();
    }


}