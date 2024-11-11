<?php
include_once __DIR__."/Controller/LoginController.php";
include_once __DIR__."/config.php";

$Controller = new LoginController($pdo);
if(!isset($_COOKIE['id_user'])){
    header("Location: index.php");
}
$id_user = $_COOKIE['id_user'];
$user = $Controller->listarContaPorID($id_user);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Hobbies</title>
</head>
<body>
    <img src="View/fotos_de_perfil/<?=$user['nome_arquivo_fotoperfil']?>" alt="foto de perfil de <?=$user['username']?>">
    <p><b>nome de usuário: </b><?=$user['username']?></p>

    <a href="mudar-foto-perfil.php">mudar foto de perfil</a>
    <a href="mudar-senha.php">mudar senha</a>
    <a href="logout.php">sair da conta</a>
</body>
</html>