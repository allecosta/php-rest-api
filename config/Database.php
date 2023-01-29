<?php

/**
 * Classe responsavel pela conexão com o banco de dados
 */
class Database 
{
    private $hostname = "localhost";
    private $username = "###";
    private $password = "###";
    private $dbname = "db_phprestapi";
    public $conn;

    public function getConnection() 
    {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=". $this->hostname .";dbname=". $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");

        } catch (PDOException $e) {
            echo "OPS! Falha na conexão com o database: " . $e->getMessage();
        }

        return $this->conn;
    }
}