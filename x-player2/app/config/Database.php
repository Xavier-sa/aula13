<?php

class Database
{

    private $host;
    private $port;
    private $username;
    private $password;
    private $db;

    private $conn;

    // responável por instânciar um objeto de Database
    public function __construct($host, $port, $username, $password, $db)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
    }

    // responsável por criar a conexão com o DB
    public function createConnection()
    {
        $connUrl = "mysql:host=localhost;port='3306';dbname=filmesdb;charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $this->conn = new PDO($connUrl, $this->username, $this->password, $options);

        return $this->conn;
    }
}

$database = new Database(
    "localhost",
    3306,
    "root",
    "",
    "filmesdb"
);

// estabelece conexão com banco
$conn = $database->createConnection();
