<?php
require_once './vendor/autoload.php';

use ExemploPDOMySQL\MySQLConnection; 
$bd = new MySQLConnection();

$genero = null;

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    $comando = $bd->prepare('SELECT * FROM generos WHERE id = :id');
    $comando->execute([':id'=> $_GET['id']]);

    $genero = $comando->fetch(PDO::FETCH_ASSOC);
}
else{
    $comando = $bd->prepare('UPDATE generos SET nome = :nome WHERE id = :id');
    $comando->execute([':nome'=> $_POST['nome'],':id' => $_POST['id']]);

    header('Location:/index.php');

}

$_title = 'Editar Gênero';

?>

 <?php include('./includes/footer.php')?>
    <h1>Editar Gênero</h1>
    <form action="uptade.php" method="post">
        <input type="hidden" name="id" value="<?= $genero['id'] ?>"/>
        <label for="nome">Nome do Gênero</label>
        <input type="text" required name="nome" value="<?= $genero['nome'] ?>"/>
        <button type="submit">Salvar</button>
    </form>
    
    <?php include('./includes/footer.php')?>