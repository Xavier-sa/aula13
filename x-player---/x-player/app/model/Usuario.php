<?php 
class Usuario {
    private $conn;
    private $table = 'usuarios';  // Nome da tabela no banco de dados

    // Propriedades do Usuário
    public $id;
    public $nome;
    public $email;
    public $senha;
    
    // Construtor que recebe a conexão e inicializa as propriedades
    public function __construct($db) {
        $this->conn = $db;
    }

    // Função para criar um novo usuário
    public function create() {
        $senhaHash = password_hash($this->senha, PASSWORD_DEFAULT); // Criação do hash da senha
        $query = "INSERT INTO " . $this->table . " (nome, email, senha) VALUES (:nome, :email, :senha)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':senha', $senhaHash);

        return $stmt->execute();
    }

    // Função de login
    public function login($email, $senha) {
        $query = "SELECT id, nome, email, senha FROM " . $this->table . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            // Verifica se a senha está correta
            if (password_verify($senha, $row['senha'])) {
                return $row;  // Retorna os dados do usuário
            }
        }
        return false;  // Retorna false caso não autentique
    }

    // Verifica se o email já existe
    public function emailExiste($email) {
        $query = "SELECT id FROM " . $this->table . " WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }
}

?>