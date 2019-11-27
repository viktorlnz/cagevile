<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
require_once 'AbstractDao.php';
require_once $path.'model/Foto.php';
class FotoDao extends AbstractDao{

  public function __construct(){
    parent::__construct();
  }

  public function insert($foto){
    $sql = 'INSERT INTO foto_especie (id_especie, principal, urlFoto) VALUES ("'
      .$foto->getEspecie()->getId().'", "'.$foto->getPrincipal().'", "'.$foto->getUrlFoto().'")';

    parent::insert($sql);

    return $this->retorno;
  }

  public function selectEspecieFoto($nome){
    $sql = 'SELECT especie.id_especie, especie.nome,
    especie.descricao, especie.motivo_extincao, especie.populacao, habitat_especie.nome as habitat,
    habitat_especie.bioma, habitat_especie.pais, foto_especie.urlFoto FROM foto_especie RIGHT JOIN
    especie ON foto_especie.id_especie = especie.id_especie
    LEFT JOIN habitat_especie ON especie.id_habitat = habitat_especie.id_habitat
    where especie.nome like "%'.$nome.'%" and foto_especie.principal = 1';

    parent::select($sql);

    $lista = array();
    //var_dump($this->retorno);
    foreach ($this->retorno as $especie) {

      $especie = new Foto(
        null,
        $especie['urlFoto'],
        null,
        $especie = new Especie(
            $especie['id_especie'],
            $especie['nome'],
            new Habitat(
                null,
                $especie['habitat'],
                $especie['bioma'],
                $especie['pais']),
            $especie['descricao'],
            $especie['motivo_extincao'],
            $especie['populacao']
        )
      );

      array_push($lista, $especie);
    }

    return $lista;
  }
}
?>
