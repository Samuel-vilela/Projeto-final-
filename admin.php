<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMINISTRADOR</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div class="ficha-titulo">
    <h1>Ficha de administração</h1>
  </div>  

    <div class="ficha-container">
        <?php
        include "conexao.php";
        
        $sql = "SELECT * FROM tb_jogos ORDER BY id DESC";
        $resultado = mysqli_query($conexao, $sql);

        while ($produto = mysqli_fetch_assoc($resultado)) {
        ?>
            <div class="ficha">
                <p><strong>Imagem:</strong> <?= htmlspecialchars($produto['img']); ?></p>
                <p><strong>Título:</strong> <?= htmlspecialchars($produto['titulo']); ?></p>
                <p><strong>Descrição:</strong> <?= htmlspecialchars($produto['descricao']); ?></p>
                <p><strong>Link:</strong> <?= htmlspecialchars($produto['link']); ?></p>
                <p><strong>Categoria:</strong> <?= htmlspecialchars($produto['categoria']); ?></p>
                <div>
                    <a href="editar.php?id=<?= $produto['id']; ?>"><button type="button">Editar</button></a>
                    <form action="excluir.php" method="get" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $produto['id']; ?>">
                        <button type="submit">Excluir</button>
                    </form>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <!-- Botão "Cadastrar" fora da tabela -->
    <div class="ficha-titulo"> 
    <div class="cadastrar-button">
        <a href="cadastrar.php"><button type="button">Cadastrar Novo</button></a>
        <a href="index.php"><button type="button">Inicio</button></a>
    </div>
    </div> 

</body>
</html>
