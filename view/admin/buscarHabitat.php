<?php require_once 'Template.php';

  $path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
  require_once $path.'controller/HabitatController.php';
  require_once $path.'model/Habitat.php';

  $busca = $_GET['nome'] ?? "";
  $lista = array();

  $controller = new HabitatController;

  $lista = $controller->buscarHabitat($busca);
  //var_dump($lista);

  $template = new Template;
?>

  <h2>Buscar Habitat</h2>
  <form id="form-busca" action="buscarHabitat.php" method="get">
    <label for="nome">Nome</label>
    <input type="text" name="nome" placeholder="Nome do habitat"/>
    <button type="submit" name="button">Buscar</button>
  </form>

  <?php
    foreach ($lista as $habitat) {
      ?>
      <hr/>
      <div class="div-registro">
        <h3><?=$habitat->getId()?></h3>
        <p><b>Nome: </b><?=$habitat->getNome()?></p>
        <p><b>Bioma: </b><?=$habitat->getBioma()?></p>
        <p><b>País: </b><?=$habitat->getPais()?></p>
    </div>
    <?php } ?>
