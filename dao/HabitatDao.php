<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
require_once('AbstractDao.php');
require_once($path.'model/Habitat.php');
class HabitatDao extends AbstractDao{

  public function __construct(){
    parent::__construct();
  }

  public function select($nome){
    $sql = 'SELECT * FROM habitat_especie where nome like "%'.$nome.'%"';

    parent::select($sql);

    $lista = array();

    foreach ($this->retorno as $habitat) {
      $habitat = new Habitat(
        $habitat['id_habitat'],
         $habitat['nome'],
          $habitat['bioma'],
          $habitat['pais']
      );
      array_push($lista, $habitat);
    }

    return $lista;
  }

  public function insert($habitat){
    $sql = 'INSERT into habitat_especie (nome, bioma, pais) VALUES ("'
      .$habitat->getNome().'", "'.$habitat->getBioma().'", "'
      .$habitat->getPais().'")';

    parent::insert($sql);

    return $this->retorno;
  }

  public function update($habitat){
    $arr = array('nome' => $habitat->getNome(),
     'bioma' => $habitat->getBioma(),
     'pais' => $habitat->getPais()
    );
    $sql = parent::makeUpdateColumn($arr);
    $sql = 'UPDATE habitat_especie  SET '.$sql.' WHERE id_habitat = '.$habitat->getId();

    echo $sql;

    return parent::update($sql);
  }

  public function delete($id){
    $sql = 'DELETE FROM habitat_especie WHERE id_habitat = '.$id;
    return parent::delete($sql);
  }
}
 ?>
