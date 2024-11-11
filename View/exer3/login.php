<?php
    require_once __DIR__."/../../Controller/AcademiaController.php";
    require_once __DIR__."/../../config.php";
    $Controller = new AcademiaController($pdo);

    if(!empty($_POST)){
        $logged_in = $Controller->LogIn($_POST['username'], $_POST['password']);
        if(!empty($logged_in)){
            $conta = $Controller->listarContaPorUsername($_POST['username']);
            if($conta['plano'] == null){
                header("location:planos.php?username=$_POST[username]");
            }else{
                header("location:treinos.php?username=$_POST[username]&plano=$conta[plano]");
            }
        }
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="display:flex; align-items:center; justify-content:center;">
    <section style="background-color:whitesmoke; border-radius:10px;">
        <form method="post" function="planos.php">
            <h2>fazer login</h2>
            <div>
                <label for="username">Nome de usuário</label>
                <input type="text" name="username" placeholder="nome de usuário">
            </div>
            <div>
                <label for="password">Sua senha</label>
                <input type="password" name="password" placeholder="sua senha">
            </div>
            <?php
            if(!empty($_POST)){echo"<p style='color:crimson'>Algo de errado não está certo, tente denovo!</p>";}
            ?>
            <button type="submit" style="font-size:20px">Efetuar Login</button>
            <a href="register.php" style="font-size:12px">não tens conta? registre-se agora!</a>
        </form>
    </section>
</body>
</html>