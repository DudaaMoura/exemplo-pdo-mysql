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
</head>
<body>
    <a href="insert.php">Novo Gênero</a>
    <table>
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
                    <a href="uptade.php?id=<?= $g['id'] ?>">Editar</a>
                    <a href="delet.php?id=<?= $g['id'] ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach ?>
        </table>
</body>
</html>