<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="editar.css">
</head>
<body>
    <h1>Edição de arquivos de luta</h1>

    <?php
    // Inclui o arquivo de conexão com o banco de dados
    include "conexao.php";

    // Verifica se o ID foi enviado
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

    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados do formulário e escapa caracteres especiais
        $id = mysqli_real_escape_string($conexao, $_POST['id']);
        $titulo = mysqli_real_escape_string($conexao, $_POST['titulo']);
        $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
        $link = mysqli_real_escape_string($conexao, $_POST['link']);
        $categoria = mysqli_real_escape_string($conexao, $_POST['categoria']);

        // Pasta onde será salva a imagem
        $pasta = "img/";

        // Recuperando informações do arquivo de imagem
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

    <!-- Formulário de edição -->
    <form action="editar.php?id=<?= htmlspecialchars($produto['id']); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($produto['id']); ?>">
        <label for="img">Imagem:</label>
        <input type="file" id="img" name="img" accept="image/*">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" value="<?= htmlspecialchars($produto['titulo']); ?>"><br>
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao"><?= htmlspecialchars($produto['descricao']); ?></textarea><br>
        <label for="link">Link:</label>
        <input type="text" id="link" name="link" value="<?= htmlspecialchars($produto['link']); ?>"><br>
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="categoria">
            <option value="anime" <?= $produto['categoria'] == 'anime' ? 'selected' : ''; ?>>Jogos de Anime</option>
            <option value="classicos" <?= $produto['categoria'] == 'classicos' ? 'selected' : ''; ?>>Jogos Clássicos</option>
            <option value="personagem" <?= $produto['categoria'] == 'personagem' ? 'selected' : ''; ?>>Personagem</option>
        </select>
        <button type="submit">Salvar</button>
    </form>
    <img src="img/leona1.png" alt="">
</body>
</html>
