<?php
  class Conexao{
    private $user, $password, $db, $host;
    private $conn;

    public function __construct(){
      $this->user = 'root';
      $this->password = '';
      $this->db = 'cagevile';
      $this->host = 'localhost';
    }

    public function conectar(){
      $this->conn = new mysqli(
        $this->host, $this->user, $this->password, $this->db
      );
      mysqli_set_charset($this->conn, "utf8");
      return $this->conn->connect_error?false:$this->conn;
    }
  }
?>
