<?php
  require_once 'Especie.php';

  class Foto{
    private $id, $urlFoto, $principal, $especie;

    public function __construct($id, $urlFoto, $principal, $especie){
      $this->id = $id;
      $this->urlFoto = $urlFoto;
      $this->principal = $principal;
      $this->especie = $especie;
    }

    public function getId(){
      return $this->id;
    }

    public function getEspecie(){
      return $this->especie;
    }

    public function getUrlFoto(){
      return $this->urlFoto;
    }

    public function getPrincipal(){
      return $this->principal;
    }

    public function setId(int $id){
      $this->id = $id;
    }

    public function setEspecie(Especie $especie){
      $this->especie = $especie;
    }

    public function setUrlFoto(string $urlFoto){
      $this->urlFoto = $urlFoto;
    }

    public function setPrincipal(bool $principal){
      $this->principal = $principal;
    }
  }
?>
