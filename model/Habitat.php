<?php
class Habitat{
  private $id, $nome, $bioma, $pais;

  public function __construct($id, $nome, $bioma, $pais){
    $this->id = $id;
    $this->nome = $nome;
    $this->bioma = $bioma;
    $this->pais = $pais;
  }

  public function getId(){
    return $this->id;
  }

  public function getNome(){
    return $this->nome;
  }

  public function getBioma(){
    return $this->bioma;
  }

  public function getPais(){
    return $this->pais;
  }
}

?>
