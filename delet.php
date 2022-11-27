<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection; 
$bd = new MySQLConnection();

$genero = null;
if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute([':id' => $_GET['id']]);

    $genero = $comando->fetch(PDO::FETCH_ASSOC);
} else {
    $comando = $bd->prepare('DELETE FROM generos WHERE id = :id');
    $comando->execute([':id' => $_POST['id']]);

    header('Location:/index.php');
}
?>

<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remover Gênero</title>
</head>
<body>
    <h1>Remover Gênero</h1>
    <p>Tem certeza que deseja remover o gênero "<?= $genero['nome'] ?>" ?</p>
    <form action="delet.php" method="post">
        <input type="hidden" name="id" value="<?= $genero['id'] ?>" />
        <button type="submit">Excluir</button>
    </form>
</body>
</html>