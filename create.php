<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD - Ph2Full</title>
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
</head>
<body class="container">
<header>
    <h1>Cadastrar Produto</h1>
</header>
<form action="src/Application/Database/Execute.php?do=create" method="post">
    <label for="nome">Nome</label>
    <input type="text" name="nome" id="nome" class="form-control">

    <label for="preco">Preço</label>
    <input type="number" name="preco" id="preco" class="form-control">

    <label for="descricao">Descrição</label>
    <textarea name="descricao" id="descricao" class="form-control"></textarea>

    <hr/>
    <button type="submit" class="btn btn-primary">Inserir</button>
    <button type="button" onclick="window.history.back()" class="btn btn-default">Voltar</button>
</form>
</body>
</html>