<?php

require_once "Model.php";

// classe Model que representa uma tabela no banco
class Filme extends Model {

    protected $table = "filme";
    protected $class = __CLASS__;

    // atributos que representam as colunas
    public $id;
    public $titulo;
    public $ano;
    public $descricao;

    public function __construct($conn = null) {
        parent::__construct($conn);
    }
    //hoje dia 18/11/2024--> logica de inserir adicionado ao codigo, ver...
    public function inserir() {
        // SQL para inserir um novo filme
        $query = "INSERT INTO " . $this->table . " (titulo, ano, descricao) VALUES (:titulo, :ano, :descricao)";

        // Preparar a consulta
        $stmt = $this->conn->prepare($query);

        // Vincular os parâmetros aos valores do objeto
        $stmt->bindParam(":titulo", $this->titulo);
        $stmt->bindParam(":ano", $this->ano);
        $stmt->bindParam(":descricao", $this->descricao);

        // Tentar executar a consulta e verificar se a inserção foi bem-sucedida
        if ($stmt->execute()) {
            // Retorna o ID do novo filme inserido
            $this->id = $this->conn->lastInsertId();
            return true;
        } else {
            // Se a execução falhar, retorna false
            return false;
        }
    }
    // Método para favoritar o filme
    public function favoritarFilme($id) {
        // Atualiza o campo "favorito" do filme para 1 (verdadeiro)
        $sql = "UPDATE " . $this->table . " SET favorito = 1 WHERE id = :id";

        // Prepara a query
        $stmt = $this->conn->prepare($sql);

        // Vincula o ID do filme ao parâmetro da query
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Executa a query e retorna o resultado
        return $stmt->execute();
    }
}
?>





}


