<?php
include_once __DIR__."/Controller/LoginController.php";
include_once __DIR__."/config.php";

$Controller = new LoginController($pdo);

if(!empty($_POST)){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $logged_in = $Controller->logIn($username, $password);

    if(!empty($logged_in)){
        // faz um cookie para marcar o login do usuário na máquina dele por 24 horas
        setcookie("id_user",$logged_in["id_user"], time()+60*60*24, "/");
        
        header("Location: hobbies.php");
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
    <form method="POST">
        <input type="text" name="username">
        <input type="password" name="password">
        
        <button type="submit">LogIn</button>
    </form>
    <p>
        Não tem uma conta? registre uma 
    <a href="register.php">aqui!</a>
    </p>

    <?php
    if(isset($logged_in) && empty($logged_in)){
        echo "usuário ou senha estão errados, tente novamente!";
    }
    ?>
</body>
</html>