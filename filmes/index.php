<?php
    // Aqui você pode incluir qualquer lógica PHP ou configurações que desejar
    // Por exemplo, incluir um cabeçalho ou rodapé de forma dinâmica
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Aplicação</title>
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navbar -->
    <?php include('navbar.php'); ?>

    <!-- Conteúdo Principal -->
    <main class="v-content">
        <section>
            <h1>Bem-vindo à nossa aplicação!</h1>
            <p>Conteúdo da página vai aqui.</p>
        </section>
    </main>
</body>
</html>
