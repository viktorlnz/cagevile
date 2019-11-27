<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
require_once('AbstractDao.php');
require_once($path.'model/Recomendacao.php');
class RecomendacaoDao extends AbstractDao{

  public function __construct(){
    parent::__construct();
  }

  public function select($nome){
    $sql = 'SELECT * FROM recomendacao where nome like "%'.$nome.'%"';

    parent::select($sql);

    $lista = array();

    foreach ($this->retorno as $rec) {
      $rec = new Recomendacao(
        $rec['id_recomendacao'],
         $rec['nome'],
          $rec['habitat'],
          $rec['descricao']
      );
      array_push($lista, $rec);
    }

    return $lista;
  }

  public function insert($rec){
    $sql = 'INSERT into recomendacao (nome, habitat, descricao) VALUES ("'
      .$rec->getNome().'", "'.$rec->getHabitat().'", "'
      .$rec->getDescricao().'")';

    parent::insert($sql);

    return $this->retorno;
  }

  public function update($rec){
    $arr = array('nome' => $rec->getNome(),
     'habitat' => $rec->getHabitat(),
     'descricao' => $rec->getDescricao()
    );
    $sql = parent::makeUpdateColumn($arr);
    $sql = 'UPDATE recomendacao  SET '.$sql.' WHERE id_recomendacao = '.$rec->getId();

    echo $sql;

    return parent::update($sql);
  }

  public function delete($id){
    $sql = 'DELETE FROM recomendacao WHERE id_recomendacao = '.$id;
    return parent::delete($sql);
  }
}
 ?>
