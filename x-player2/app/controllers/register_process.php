<?php
// Iniciar a sessão
session_start();

// Incluir o arquivo de conexão e o modelo de usuário
require_once 'app/config/Database.php';
require_once 'app/model/Usuario.php';

// Criar a conexão com o banco de dados
$database = new Database();
$db = $database->getConnection();

// Instanciar o modelo de usuário
$usuario = new Usuario($db);

// Pegar os dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

// Criar o usuário
if ($usuario->create($nome, $email, $senha)) {
    // Cadastro bem-sucedido, redirecionar para a tela de login
    header("Location: app/view/Filme/Listar.php");
} else {
    // Caso contrário, mostrar erro
    echo "Erro ao criar o usuário!";
}
?>
