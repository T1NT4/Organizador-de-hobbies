<?php

if(isset($_COOKIE['id_user'])){
    $user = $Controller->listarContaPorID($_COOKIE['id_user']);
    
    if(!isset($user)){
        header("location: logout.php");
    }
    echo "<header>";
    echo"<a class='logo' href='index.php'><img src='Captura_de_tela_2024-11-11_140326-removebg-preview (1).png'><h1>HOBBLY</h1></a>";
    echo"<a href='index.php'>página inicial</a>";
    echo"<a href='hobbies.php'>ver hobbies</a>";
    echo"<a href='usuario.php' class='fotoperfil'>";
    echo"<figure><img src='View/fotos_de_perfil/$user[nome_arquivo_fotoperfil]'></figure>";
    echo"<h4>$user[username]</h4>";
    echo"</a>";
    echo"</header>";
}else{
    $user = null;

    echo"<header>";
    echo"<figure class='logo'><img src='Captura_de_tela_2024-11-11_140326-removebg-preview (1).png'><h1>HOBBLY</h1></figure>";
    echo"<a href='login.php'>Entrar na conta</a>";
    echo"<br>";
    echo"<a href='register.php'>Registar conta</a>";
    echo"</header>";
}


?>