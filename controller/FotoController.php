<?php
  $path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
  require_once $path.'model/Especie.php';
  require_once $path.'model/Foto.php';
  require_once $path.'dao/FotoDao.php';

class FotoController{
  private $dao;
  private $uploadDir;
  public function __construct(){
    $this->dao = new FotoDao;
    $this->uploadDir = $_SERVER['DOCUMENT_ROOT'].'/cagevile/img/';
  }

  public function inserirFoto(Especie $especie, bool $principal){
    $uploadFile = $this->uploadDir.basename($_FILES['foto']['name']);
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {

      $foto = new Foto(null, '/img/'.$_FILES['foto']['name'], $principal, $especie);
      return $this->dao->insert($foto);
    }

    else{
      echo $_FILES['foto']['error'];
      return false;
    }
  }

  public function listarEspecieFoto($nome){
    return $this->dao->selectEspecieFoto($nome);
  }

  public function atualizarEspecie($especie){
    //return $this->dao->update($especie);
  }

  public function deletarEspecie($id){
    //return $this->dao->delete($id);
  }
}
?>
