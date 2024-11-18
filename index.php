<?php
include_once __DIR__ . "/Controller/LoginController.php";
include_once __DIR__ . "/config.php";

$Controller = new LoginController($pdo);
?><!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="Captura_de_tela_2024-11-11_140326-removebg-preview (1).png" type="image/png">
    <title>Hobbly</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <?php
    include __DIR__ . "/View/perfil.php";
    ?>
    <div class="texto">
        <p>
            Descubra uma variedade de hobbies para todos os gostos na nossa página! Desde atividades criativas como
            pintura e DIY, até esportes, culinária, tecnologia e colecionismo, temos algo para todos. Não importa o seu
            interesse, sempre há algo novo para explorar e aprender.</p>

        <p> Além de inspirar e ensinar, nossa página também oferece uma comunidade para compartilhar experiências e
            fazer novas amizades. Junte-se a nós e transforme seu tempo livre em momentos de diversão, desenvolvimento e
            bem-estar!</p>

        <p>
            Para começar a sua jornada conosco, faça uma conta <a href="register.php">aqui</a>!
        </p>
    </div>

    <?php include "View/footer.php" ?>
</body>

</html>