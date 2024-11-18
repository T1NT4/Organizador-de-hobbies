<?php
include_once __DIR__ . "/Controller/LoginController.php";
include_once __DIR__ . "/config.php";

$Controller = new LoginController($pdo);
if (!isset($_COOKIE['id_user'])) {
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
    <link rel="shortcut icon" href="Captura_de_tela_2024-11-11_140326-removebg-preview (1).png" type="image/png">
    <link rel="stylesheet" href="estilo.css">
    <title>Hobbly - Página de perfil</title>
</head>

<body>
    <div class="seila">
        <div class="texto">
            <img class="fotoperfildef" src="View/fotos_de_perfil/<?= $user['nome_arquivo_fotoperfil'] ?>"
                alt="foto de perfil de <?= $user['username'] ?>">
            <p><b>Nome de usuário: </b><?= $user['username'] ?></p>
        </div>
        <div class="navnav">
            <a href="mudar-foto-perfil.php">Mudar foto de perfil</a>
            <a href="mudar-senha.php">Mudar senha</a>
            <a href="logout.php">Sair da conta</a>
        </div>
    </div>
    


    <?php include "View/footer.php" ?>
</body>

</html>