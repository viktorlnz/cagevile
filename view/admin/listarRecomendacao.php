<?php require_once 'Template.php';

  $path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
  require_once $path.'controller/RecomendacaoController.php';
  require_once $path.'model/Recomendacao.php';

  $busca = $_GET['nome'] ?? "";
  $lista = array();

  $controller = new RecomendacaoController;

  $delete = $_POST['id'] ?? null;
  if($delete){
    $controller->deletarRecomendacao($delete);
  }

  $lista = $controller->buscarRecomendacao($busca);
  //var_dump($lista);



  $template = new Template;
?>

  <h2>Recomendações</h2>
  <form id="form-busca" action="listarRecomendacao.php" method="get">
    <label for="nome">Nome</label>
    <input type="text" name="nome" placeholder="Espécie da recomendação:"/>
    <button type="submit" name="button">Buscar</button>
  </form>

  <?php
    foreach ($lista as $rec) {
      ?>
      <hr/>
      <div class="div-registro">
        <h3><?=$rec->getId()?></h3>
        <p><b>Nome: </b><?=$rec->getNome()?></p>
        <p><b>Habitat: </b><?=$rec->getHabitat()?></p>
        <p><b>Descrição: </b><?=$rec->getDescricao()?></p>
        <form action="listarRecomendacao.php" method="post">
          <input type="hidden" name="id" value=<?='"'.$rec->getId().'"' ?> />
          <button type="submit" name="button">Deletar</button>
        </form>
      </div>
    <?php } ?>
