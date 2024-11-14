<?php

if(isset($_COOKIE['id_user'])){
    $user = $Controller->listarContaPorID($_COOKIE['id_user']);
    
    if(!isset($user)){
        header("location: logout.php");
    }
    echo "<header>";
    echo"<a href='index.php'>página inicial</a>";
    echo"<a href='hobbies.php'>ver hobbies</a>";
    echo"<a href='usuario.php' class='fotoperfil'>";
    echo"<figure><img src='View/fotos_de_perfil/$user[nome_arquivo_fotoperfil]'></figure>";
    echo"<h4>$user[username]</h4>";
    echo"</a>";
    echo"</header>";
}else{
    $user = null;
    echo"<a href='login.php'>entrar na conta</a>";
    echo"<br>";
    echo"<a href='register.php'>registar uma conta</a>";
}


?>