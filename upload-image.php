<?php
// Define o diretório de upload
$diretorio = "View/fotos_de_perfil/";

// Verifica se o diretório existe, se não existir, cria o diretório
if (!is_dir($diretorio)) {
    mkdir($diretorio, 0777, true);
}

// Pega as informações do arquivo usando o novo name "foto-perfil"

$arquivo = $imagem_arquivo['name'];
$caminho_temporario = $imagem_arquivo['tmp_name'];
$tamanho_arquivo = $imagem_arquivo['size'];

$extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));

// Define o caminho final do arquivo
$caminho_final = $diretorio . basename($_POST['username'].".png");
$nome_arquivo_fotoperfil = str_replace("View/fotos_de_perfil/","",$caminho_final);
// Verifica se o arquivo é uma imagem e seu tamanho é permitido (5MB no exemplo)
$tipos_permitidos = ['jpg', 'jpeg', 'png'];
$extensao = strtolower(pathinfo($caminho_final, PATHINFO_EXTENSION));

$error_code = null;

if (in_array($extensao, $tipos_permitidos)) {
    if ($tamanho_arquivo <= 5000000) { // Limite de 5MB
        // Faz o upload do arquivo
        if (move_uploaded_file($caminho_temporario, $caminho_final)) {
            // echo "Upload bem-sucedido! Imagem salva em: $caminho_final";
            echo "";
        } else {
            $error_code = "Erro ao fazer o upload do arquivo.";
        }
    } else {
        $error_code = "O arquivo é muito grande. O limite é de 5MB.";
    }
} else {
    $error_code = "Tipo de arquivo não permitido. Somente JPG, JPEG, PNG e GIF são aceitos.";
}
?>