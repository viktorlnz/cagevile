<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
require_once('AbstractDao.php');
require_once($path.'model/Especie.php');
//require($path.'model/Habitat.php');

class EspecieDao extends AbstractDao{

  public function __construct(){
    parent::__construct();
  }

  public function select($nome){
    $sql = 'SELECT especie.id_especie, especie.nome, '
    .'especie.descricao, especie.motivo_extincao, especie.populacao, '
    .'habitat_especie.id_habitat, habitat_especie.nome as habitat, '
    .'habitat_especie.bioma, habitat_especie.pais FROM especie '
    .'LEFT JOIN habitat_especie ON especie.id_habitat = habitat_especie.id_habitat '
    .'where especie.nome like "%'.$nome.'%"';

    parent::select($sql);

    $lista = array();

    foreach ($this->retorno as $especie) {
      $especie = new Especie(
        $especie['id_especie'],
         $especie['nome'],
          new Habitat($especie['id_habitat'], $especie['habitat'], $especie['bioma'], $especie['pais']),
          $especie['descricao'],
          $especie['motivo_extincao'],
          $especie['populacao']

      );
      array_push($lista, $especie);
    }

    return $lista;
  }

  public function insert($especie){
    $sql = 'INSERT into especie (nome, id_habitat, descricao, motivo_extincao, populacao) VALUES ("'
      .$especie->getNome().'", "'.$especie->getHabitat()->getId().'", "'
      .$especie->getDescricao().'", "'.$especie->getMotivo().'", "'
      .$especie->getPopulacao().'")';

    parent::insert($sql);

    return $this->retorno;
  }

  public function update($especie){
    $arr = array('nome' => $especie->getNome(),
     'id_habitat' => $especie->getHabitat()->getId(),
      'descricao' => $especie->getDescricao(),
      'motivo' => $especie->getMotivo(),
      'populacao' => $especie->populacao()
    );

    $sql = parent::makeUpdateColumn($arr);
    $sql = 'UPDATE especie  SET '.$sql.' WHERE id_especie = '.$especie->getId();

    echo $sql;

    return parent::update($sql);
  }

  public function delete($id){
    $sql = 'DELETE FROM especie WHERE id_especie = '.$id;
    return parent::delete($sql);
  }
}