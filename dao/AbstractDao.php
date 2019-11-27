<?php
  $path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
  require $path.'bd/Conexao.php';

  abstract class AbstractDao
  {
    protected $retorno, $conn;


    function __construct()
    {
      $this->retorno = null;
      $this->conn = new Conexao();
      $this->conn = $this->conn->conectar();
    }

    public function insert($sql){

      if($this->conn->query($sql) == TRUE){
        $sql = 'SELECT LAST_INSERT_ID() as "id";';

        $result = $this->conn->query($sql);

        while($row = $result->fetch_assoc()){
          $this->retorno = $row['id'];
        }
      }
      else{
        echo $this->conn->error;
        $this->retorno = false;
      }
      return $this->retorno;
    }

    public function select($sql){

      $results = $this->conn->query($sql);

      if($this->conn->error){
        echo $this->conn->error;
        $this->retorno = false;
      }

      else{
        $this->retorno = array();

        if($results->num_rows==1){
          array_push($this->retorno, $results->fetch_assoc());
        }
        else{
          while($row = $results->fetch_assoc()){
            array_push($this->retorno, $row);
          }
        }
      }

      return $this->retorno;
    }

    public function update($sql){
      return $this->conn->query($sql)?true:false;
    }

    public function delete($sql){
      $r = $this->conn->query($sql)?true:false;
      if (!$r) {
        echo $this->conn->error;
      }
      return $r;
    }

    protected function makeUpdateColumn($arr){
      $alters = array();
      foreach ($arr as $indice => $coluna) {
        var_dump($coluna);
        if ($coluna != null) {
          array_push($alters,' '.$indice.' = "'.$coluna.'"');
        }
      }

      return implode(', ', $alters);
    }

  }

 ?>
