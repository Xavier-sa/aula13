<?php

require __DIR__ . "\..\..\Config\Database.php";
require __DIR__ . "\..\..\Model\Filme.php";

$filmeModel = new Filme($conn);
$filmes = $filmeModel->findAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>

    <style>
        .table {
            tr, td, th {
                border: 1px solid;
            }
        }
    </style>
</head>
<body>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Ano</th>
                <th>Descrição</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <!-- percorre a lista de resultados -->
            <?php foreach ($filmes as $filme) { ?>
                <tr>
                    <!-- escreve na tabela cada item retornado -->
                    <td><?php echo $filme->id ?></td>
                    <td><?php echo $filme->titulo ?></td>
                    <td><?php echo $filme->ano ?></td>
                    <td><?php echo $filme->descricao ?></td>
                    <td>
                    <form action="listar.php" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este filme?');">
                            <input type="hidden" name="excluir_id" value="<?php echo $filme->id; ?>">
                            <button type="submit">Excluir</button>
                        </form>
                        <form action="Visualizar.php" method="GET">
                            <input 
                                type="hidden"
                                name="id" 
                                value="<?php echo $filme->id ?>"
                            >
                            <button>Detalhes</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>