<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
require_once $path.'dao/HabitatDao.php';


/**
 *
 */
class HabitatController
{
  private $dao;

  function __construct()
  {
    $this->dao = new HabitatDao;
  }

  public function inserirHabitat($habitat){
    return $this->dao->insert($habitat);
  }

  public function buscarHabitat($nome){
    return $this->dao->select($nome);
  }

  public function atualizarHabitat($habitat){
    return $this->dao->update($habitat);
  }

  public function deletarHabitat($id){
    return $this->dao->delete($id);
  }
}

 ?>
