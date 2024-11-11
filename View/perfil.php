<?php

if(isset($_COOKIE['id_user'])){
    $user = $Controller->listarContaPorID($_COOKIE['id_user']);
    
    echo "<img width='200' src='View/fotos_de_perfil/$user[nome_arquivo_fotoperfil]'>";
    echo"<h4>$user[username]</h4>";
    echo"<a href='logout.php'>sair da conta</a>";
}else{
    $user = null;
    echo"<a href='login.php'>entrar na conta</a>";
    echo"<br>";
    echo"<a href='register.php'>registar uma conta</a>";
}


?>