<?php


if ( $_SERVER["REQUEST_MTHOD"] === "POST"){
    if ( isset( $_POST["titulo"] ) && isset( $_POST["ano"] )){

        
    }
}



?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Filme</title>
    
</head>
<body>
    <div class="container">
        <h2>Cadastrar Novo Filme</h2>
        <form action="cadastrar.php" method="POST">
            <div class="form-group">
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" required>
            </div>

            <div class="form-group">
                <label for="ano">Ano:</label>
                <input type="number" id="ano" name="ano" required>
            </div>

            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" rows="7" required></textarea>
            </div>

            <div class="form-group">
                <button type="submit">Cadastrar Filme</button>
            </div>
        </form>
        <p><a href="listar.php">Ver lista de filmes</a></p>
    </div>
</body>
</html>


