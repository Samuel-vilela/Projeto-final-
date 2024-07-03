<?php

$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$link = $_POST["link"];
$categoria = $_POST["categoria"];

// Pasta onde será salva a imagem
$pasta = "img/";

// Recuperando informações do arquivo de imagem
$nomeDaImagem = $_FILES['img']['name'];
$imagemTemporaria = $_FILES['img']['tmp_name'];

// Gerando um nome único para o arquivo de imagem
$extensao = pathinfo($nomeDaImagem, PATHINFO_EXTENSION);
$nomeNovo = uniqid() . '.' . $extensao;

//  pasta de destino

$caminhoCompleto = $pasta . $nomeNovo;
move_uploaded_file($imagemTemporaria, $caminhoCompleto);


include "conexao.php";

$imagem = $nomeNovo;

$sql = "INSERT INTO tb_jogos (img, titulo, descricao, link, categoria) VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexao, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $imagem, $titulo, $descricao, $link, $categoria);
mysqli_stmt_execute($stmt);

// Verificação de erro 
if (mysqli_stmt_error($stmt)) {
    echo "Erro: " . mysqli_stmt_error($stmt);
} else {
    
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
    
    header("Location: index.php");
    exit();
}
?>
