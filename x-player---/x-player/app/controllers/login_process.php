<?php
session_start();

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pegar os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Incluir o arquivo de conexão e o modelo de usuário
    require_once '../config/Database.php';
    require_once '../model/Usuario.php';

    // Criar a conexão com o banco de dados
    $database = new Database();
    $db = $database->getConnection();

    // Instanciar o modelo de usuário
    $usuario = new Usuario($db);

    // Tentar autenticar o usuário
    $usuarioAutenticado = $usuario->login($email, $senha);

    if ($usuarioAutenticado) {
        // Se a autenticação for bem-sucedida, armazenar os dados na sessão
        $_SESSION['usuario_id'] = $usuarioAutenticado['id'];
        $_SESSION['usuario_nome'] = $usuarioAutenticado['nome'];

        // Redirecionar para a página de filmes
        header("Location: ../view/Filme/Listar.php");
        exit;  // Impede que o código abaixo seja executado
    } else {
        // Caso contrário, definir uma variável de erro
        $_SESSION['login_error'] = "E-mail ou senha inválidos!";
        header("Location: ../view/Usuario/Login.php");  // Redireciona de volta para o login
        exit;
    }
}
?>
