<?php
/**
 * Created by PhpStorm.
 * User: enzo
 * Date: 23/06/16
 * Time: 15:14
 */

try {
    include("Instructions.php");
    include("../../Core/Database/Conn.php");
    switch ($_GET["do"]) {
        case "create":
            $create = new \Application\Database\Instructions("produtos", "create");
            header("Location: /crudph2/index.php");
            break;
        case "update":
            $update = new \Application\Database\Instructions("produtos", "update");
            header("Location: /crudph2/index.php");
            break;
        case "delete":
            $delete = new \Application\Database\Instructions("produtos", "delete");
            header("Location: /crudph2/index.php");
            break;
    }
} catch (Exception $e) {
    throw new Exception("Erro código: {$e->getCode()}; mensagem: {$e->getMessage()}");
}