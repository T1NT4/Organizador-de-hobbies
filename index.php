<?php
include_once __DIR__."/Controller/LoginController.php";
include_once __DIR__."/config.php";

$Controller = new LoginController($pdo);
?><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Hobbies</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <?php
        include __DIR__."/View/perfil.php";
    ?>

</body>
</html>