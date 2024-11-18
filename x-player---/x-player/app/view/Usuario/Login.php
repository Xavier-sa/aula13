<?php

session_start();

// Verificar se o usuário já está logado
if (isset($_SESSION['usuario_id'])) {
    header("Location: ../Filme/Listar.php");  // Certifique-se de que o caminho para a página de Listar Filmes está correto
    exit;
}


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            margin: 20px 0 40px 0;
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 10px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #1e1e1e;
            color: #ffffff;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 30px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Estilo para mensagens de erro */
        .error {
            color: #ff0000;
            font-size: 14px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        
        <!-- Exibir erro se houver -->
        <?php if (isset($_SESSION['login_error'])): ?>
            <p class="error"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
        <?php endif; ?>

        <form action="Login_process.php" method="POST">
            <div>
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div>
                <button type="submit">Entrar</button>
            </div>
        </form>
        <p>Ainda não tem uma conta? <a href="register_process.php">Cadastre-se</a></p>
    </div>
</body>
</html>
