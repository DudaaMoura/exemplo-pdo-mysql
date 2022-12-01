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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
<main class="container">
    <h1>Remover Gênero</h1>
    <p>Tem certeza que deseja remover o gênero "<?= $genero['nome'] ?>" ?</p>
    <form action="delet.php" method="post">
        <input type="hidden" name="id" value="<?= $genero['id'] ?>" />
        <a class="btn btn-secondary" href="index.php">Voltar</a>
        <button class="btn btn-danger" type="submit">Excluir</button>
    </form>
</main>
</body>
</html>