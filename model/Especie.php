<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
require_once $path.'model/Habitat.php';
class Especie{
  private $id, $nome, $habitat, $descricao, $motivo, $populacao;

  public function __construct(
    $id, $nome, $habitat,
     $descricao, $motivo,
      $populacao){
    $this->id = $id;
    $this->nome = $nome;
    $this->habitat = $habitat;
    $this->descricao = $descricao;
    $this->motivo = $motivo;
    $this->populacao = $populacao;
  }

  public function getId(){
    return $this->id;
  }

  public function getNome(){
    return $this->nome;
  }

  public function getDescricao(){
    return $this->descricao;
  }

  public function getHabitat(){
    return $this->habitat;
  }

  public function getMotivo(){
    return $this->motivo;
  }

  public function getPopulacao(){
    return $this->populacao;
  }

}

?>
