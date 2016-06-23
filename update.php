<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Ph2Full</title>
    <?php
    define("ROOT", dirname(__FILE__));
    define("DS", DIRECTORY_SEPARATOR);

    try {
        include(ROOT . DS . "vendor" . DS . "autoload.php");
        $conn = new \Core\Database\Conn();
    } catch (Exception $e) {
        throw new Exception("Erro código: {$e->getCode()}; mensagem: {$e->getMessage()}");
    } finally {
        $query = "SELECT * FROM produtos WHERE id = :id";
        $pdo = $conn->getConn();
        $read = $pdo->prepare($query);
        $read->bindParam(":id", $_GET["id"]);
        $read->execute();
        $resultado = $read->fetch(\PDO::FETCH_OBJ);
    }
    ?>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>
<body class="container">
<header>
    <h1>Alterar Produto</h1>
</header>
<form action="src/Application/Database/Execute.php?do=update" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" value="<?=$resultado->nome?>" class="form-control">

    <label for="preco">Preço</label>
    <input type="number" name="preco" id="preco" value="<?=$resultado->preco?>" class="form-control">

    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" class="form-control"><?=$resultado->descricao?></textarea>


    <input type="hidden" name="id" value="<?=$resultado->id?>">

    <hr/>
    <button type="submit" class="btn btn-primary">Alterar</button>
    <button type="button" onclick="window.history.back()" class="btn btn-default">Voltar</button>
</form>
</body>
</html>