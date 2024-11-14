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
    
    $senhaconfirmada = $Controller->confirmarSenha($username,$password);

    if(!empty($senhaconfirmada)){
        $imagem_arquivo = $_FILES['foto-perfil'];
        include __DIR__.'/upload-image.php';
    
        $error_code = 0;

        if($error_code == null){
            header("Location: usuario.php");
        }
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo.css">
    <title>Gerenciador de Hobbies</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
    <input required type="password" name="password" placeholder="confirme a senha">
    <label for="foto-perfil">nova foto de perfil: </label>
    <input required type="file" name="foto-perfil" accept="image/jpg, image/jpeg, image/png">
    
    <button type="submit">Atualizar foto de perfil</button>
    </form>
    <?php
        if(!empty($_POST)){
            echo"<p>errou a senha! tente novamente.</p>";
        }
        if(isset($error_code) && $error_code != null){
            echo $error_code;
        }
    ?>
</body>
</html>