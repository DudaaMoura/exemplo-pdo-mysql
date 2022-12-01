<?php
require_once './vendor/autoload.php';
use ExemploPDOMySQL\MySQLConnection; //PDO

$bd = new MySQLConnection(); //PDO('mysql:host=localhost;dbname=biblioteca', 'root', '');

$comando = $bd->prepare('SELECT * FROM generos');
$comando->execute();
$generos = $comando->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <main class="container">
    <a class="btn btn-primary" href="insert.php">Novo Gênero</a>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>&nbsp;</th>
        </tr>
        <?php foreach($generos as $g) : ?>
            <tr>
                <td><?= $g['id'] ?></td>
                <td><?= $g['nome'] ?></td>
                <td> 
                    <a class="btn btn-secondary" href="uptade.php?id=<?= $g['id'] ?>">Editar</a>
                    <a class="btn btn-danger" href="delet.php?id=<?= $g['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach ?>
        </table>
    </main>
</body>
</html>