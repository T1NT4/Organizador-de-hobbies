<?php
    require_once __DIR__."/../../Controller/AcademiaController.php";
    require_once __DIR__."/../../config.php";
    $Controller = new AcademiaController($pdo);

    if(!empty($_POST)){
        $cadastrou = $Controller->CadastrarConta($_POST['username'], $_POST['password']);
        if($cadastrou){
            header("location:login.php");
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="display:flex; align-items:center; justify-content:center;">
    <section style="background-color:whitesmoke; border-radius:10px;">
        <form method="post" function="login.php">
            <h2>registrar conta</h2>
            <div>
                <label for="username">Nome de usuário</label>
                <input type="text" name="username" placeholder="nome de usuário">
            </div>
            <div>
                <label for="password">Sua senha</label>
                <input type="password" name="password" placeholder="sua senha">
            </div>
            <button type="submit" style="font-size:20px">Fazer Conta</button>
        </form>
        <?php
            if(!empty($_POST) && !$cadastrou){echo"<p style='color:crimson'>Esse usuário ja existe, escolha outro nome!</p>";}
        ?>
    </section>
</body>
</html>