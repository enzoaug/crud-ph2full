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
        $query = "SELECT * FROM produtos";
        $pdo = $conn->getConn();
        $read = $pdo->prepare($query);
        $read->execute();
        $resultado = $read->fetchAll(\PDO::FETCH_OBJ);
    }
    ?>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <style>
        thead {
            font-weight: bolder;
        }
    </style>
</head>
<body class="container">
<header>
    <a href="/crudph2/create.php"><h4>Cadastrar Produto</h4></a>
</header>
<table class="table table-bordered table-striped table-hover">
    <thead>
    <tr>
        <td>Nome</td>
        <td>Preço</td>
        <td>Descrição</td>
        <td>Ações</td>
        <td colspan="2"></td>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($resultado as $p) : ?>
        <tr>
            <td><?= $p->nome ?></td>
            <td>R$ <?= $p->preco ?></td>
            <td><?= $p->descricao ?></td>
            <td><a href="update.php?id=<?= $p->id ?>">Alterar</a></td>
            <td colspan="2"><a class="delete" href="src/Application/Database/Execute.php?&do=delete&id=<?= $p->id ?>">Deletar</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<footer>
    <p>&copy; Todos os direitos reservados para Enzo Augusto, <?= date("Y") ?></p>
</footer>
</body>
<script>
    var del = document.querySelectorAll('.delete');

    for (var i = 0; i < del.length; i++) {
        del[i].addEventListener('click', function (e) {
            if (confirm("Deseja remover este produto?")) {
                return true;
            }
            else {
                e.preventDefault();
                return false;
            }
        });
    }
</script>
</html>