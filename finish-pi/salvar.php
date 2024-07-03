<?php

include "conexao.php";

// Verifica se o ID 

if (isset($_GET['id'])) {
    $id = $_GET['id']; 

    // Consulta SQL para selecionar o registro com o ID fornecido
    $sql = "SELECT * FROM tb_jogos WHERE id = ?";
    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $produto = mysqli_fetch_assoc($resultado);
} else {
    echo "ID não fornecido.";
    exit;
} 
//  --- x ---

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = mysqli_real_escape_string($conexao, $_POST['id']);
    $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
    $link = mysqli_real_escape_string($conexao, $_POST['link']);
    $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);

    $pasta = "img/";

    $nomeDaImagem = $_FILES['img']['name'];
    $imagemTemporaria = $_FILES['img']['tmp_name'];

    // Se o nome do arquivo não estiver vazio, tratar o upload da imagem
    if (!empty($nomeDaImagem)) {
        $extensao = pathinfo($nomeDaImagem, PATHINFO_EXTENSION);
        $nomeNovo = uniqid() . '.' . $extensao;
        $caminhoCompleto = $pasta . $nomeNovo;

        if (move_uploaded_file($imagemTemporaria, $caminhoCompleto)) {
            // Atualiza o registro incluindo a nova imagem
            $sql = "UPDATE tb_jogos SET img = ?, titulo = ?, descricao = ?, link = ?, categoria = ? WHERE id = ?";
            $stmt = mysqli_prepare($conexao, $sql);
            mysqli_stmt_bind_param($stmt, 'sssssi', $nomeNovo, $titulo, $descricao, $link, $categoria, $id);
        } else {
            echo "Erro ao mover o arquivo para a pasta de destino.";
            exit;
        }
    } else {
        // Atualiza o registro sem modificar a imagem
        $sql = "UPDATE tb_jogos SET titulo = ?, descricao = ?, link = ?, categoria = ? WHERE id = ?";
        $stmt = mysqli_prepare($conexao, $sql);
        mysqli_stmt_bind_param($stmt, 'ssssi', $titulo, $descricao, $link, $categoria, $id);
    }

    // Executa a consulta
    if (mysqli_stmt_execute($stmt)) {
        echo "Registro atualizado com sucesso!";
        // Redireciona de volta para a página de administração
        header("Location: admin.php");
        exit;
    } else {
        echo "Erro ao atualizar o registro: " . mysqli_stmt_error($stmt);
    }
}
?>
