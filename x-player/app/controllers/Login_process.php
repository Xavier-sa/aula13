<?php
session_start();
//
//if (!isset($_SESSION['usuario_id'])) {
 //   header("Location: login.php");  // Caso não esteja logado, redireciona para a página de login
 //   exit;
//}
// Incluir o arquivo de conexão e o modelo de usuário
require_once '../config/Database.php';
require_once '../model/Usuario.php';

// Criar a conexão com o banco de dados
$database = new Database('localhost', 3306, 'root', '', 'filmesdb');
$db = $database->createConnection();

// Instanciar o modelo de usuário
$usuario = new Usuario($db);

// Pegar os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Tentar autenticar o usuário
$usuario = $usuario->login($email, $senha);

if ($usuario) {
    // Autenticação bem-sucedida - armazenar os dados do usuário na sessão
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nome'] = $usuario['nome'];

    // Redirecionar para a página de listar filmes
    header("Location: Listar.php");
    exit;  // Adicione o exit para evitar que o código continue executando
} else {
    // Caso contrário, mostrar erro
    echo "E-mail ou senha inválidos!";
}
?>
