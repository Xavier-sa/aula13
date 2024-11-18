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
    
}