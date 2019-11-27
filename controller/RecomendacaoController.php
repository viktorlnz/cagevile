<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
require_once $path.'dao/RecomendacaoDao.php';


/**
 *
 */
class RecomendacaoController
{
  private $dao;

  function __construct()
  {
    $this->dao = new RecomendacaoDao;
  }

  public function inserirRecomendacao($recomendacao){
    return $this->dao->insert($recomendacao);
  }

  public function buscarRecomendacao($nome){
    return $this->dao->select($nome);
  }

  public function atualizarRecomendacao($recomendacao){
    return $this->dao->update($recomendacao);
  }

  public function deletarRecomendacao($id){
    return $this->dao->delete($id);
  }
}

 ?>
