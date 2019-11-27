<?php 
      $path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
      require_once $path.'dao/EspecieDao.php';

      /**
       *
       */
      class EspecieController
      {
        private $dao;
      
        function __construct()
        {
          $this->dao = new EspecieDao;
        }
      
        public function inserirEspecie($especie){
          return $this->dao->insert($especie);
        }
      
        public function buscarEspecie($nome){
          return $this->dao->select($nome);
        }
      
        public function atualizarEspecie($especie){
          return $this->dao->update($especie);
        }
      
        public function deletarEspecie($id){
          return $this->dao->delete($id);
        }

      }
 ?>
