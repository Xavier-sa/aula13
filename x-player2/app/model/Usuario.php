<?php
class Usuario {
    private $conn;
    private $table = 'usuarios';  // Nome da tabela no banco de dados

    // Propriedades do Usuário
    public $id;
    public $nome;
    public $email;
    public $senha;
    public $data_criacao;

    // Construtor que recebe a conexão
    public function __construct($db) {
        $this->conn = $db;
    }

    // Função para criar um novo usuário
    public function create() {
        // Hash da senha para maior segurança
        $senhaHash = password_hash($this->senha, PASSWORD_DEFAULT);

        // Comando SQL para inserir um novo usuário
        $query = "INSERT INTO " . $this->table . " (nome, email, senha) VALUES (:nome, :email, :senha)";
        
        // Preparando a consulta
        $stmt = $this->conn->prepare($query);

        // Bind dos parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $senhaHash);

        // Executa a consulta
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function login($email, $senha) {
        $query = "SELECT id, nome, email, senha FROM usuarios WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
    
        // Filtrando os dados
        $stmt->bindParam(":email", $email);
    
        // Executa a query
        $stmt->execute();
    
        // Verifica se o usuário existe
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verifica se a senha está correta (usando hash de senha, por exemplo)
            if (password_verify($senha, $row['senha'])) {
                return $row;  // Retorna os dados do usuário
            }
        }
    
        // Retorna false se o login falhar
        return false;
    }
    public function emailExiste($email) {
        $query = "SELECT id FROM " . $this->table . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return true; // Email já existe
        }
        return false; // Email não existe
    }
}  
    
    




// // Exemplo de como utilizar o método login
// $email = $_POST['email'];
// $senha = $_POST['senha'];

// $usuario = new Usuario($db);
// $resultado = $usuario->login($email, $senha);

// if ($resultado) {
//     // Login bem-sucedido
//     $_SESSION['usuario_id'] = $resultado['id'];
//     $_SESSION['usuario_nome'] = $resultado['nome'];
//     header("Location: app/view/Filme/Listar.php"); // Redireciona para a página de filmes
// } else {
//     echo "E-mail ou senha inválidos!";
// }
?>