<?php
  class Recomendacao{
    private $id, $nome, $habitat, $descricao;

    public function __construct($id, $nome, $habitat, $descricao){
      $this->id = $id;
      $this->nome = $nome;
      $this->habitat = $habitat;
      $this->descricao = $descricao;
    }

    public function getId(){
      return $this->id;
    }

    public function getNome(){
      return $this->nome;
    }

    public function getHabitat(){
      return $this->habitat;
    }

    public function getDescricao(){
      return $this->descricao;
    }

    
  }
 ?>
