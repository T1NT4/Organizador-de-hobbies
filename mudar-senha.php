<?php
include_once __DIR__."/Controller/LoginController.php";
include_once __DIR__."/config.php";

$Controller = new LoginController($pdo);

$user = $Controller->listarContaPorID($_COOKIE['id_user']);
    
if(!isset($user)){
    header("location: logout.php");
}

if(!empty($_POST)){
    $username = $user['username'];
    $password = $_POST['password'];
    $new_password = $_POST['new_password'];
    
    $senhaconfirmada = $Controller->confirmarSenha($username,$password);

    if(!empty($senhaconfirmada)){
        $Controller->updateUser($id_user,$new_password);

        header("Location: usuario.php");
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de Hobbies</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
    <input required type="password" name="password" placeholder="confirme a senha">
    <input required type="password" name="new_password" placeholder="digite a nova senha">

    <button type="submit">Atualizar senha</button>
    </form>
    <?php
        if(!empty($_POST)){
            echo"<p>Você errou sua senha atual! tente novamente.</p>";
        }
    ?>
</body>
</html>