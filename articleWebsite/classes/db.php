<?php

class DB {
    private $server = 'localhost';
    private $database = 'article_website';
    private $username = 'root';
    private $password = '';

    private $conn;
    private $dsn;

    public function __construct() {
        $this->dsn = "mysql:host={$this->server};dbname={$this->database}";
        $this->conn = null;
    }

    public function open() {
        if ($this->conn === null) {
            $this->conn = new PDO($this->dsn, $this->username,$this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
    }

    public function isOpen() {
        return $this->conn !== null;
    }

    public function getConnection() {
        return $this->conn;
    }

    public function close() {
        $this->conn = null;
    }
}
?>