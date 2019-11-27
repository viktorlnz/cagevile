<?php require_once 'Template.php';
  $path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
  require_once $path.'controller/HabitatController.php';
  require_once $path.'model/Habitat.php';

  $form = new Habitat($_POST['id'] ?? null,
   $_POST['nome'] ?? null, $_POST['bioma'] ?? null,
  $_POST['pais'] ?? null);

  if($form->getId() !== null){
    $controller = new HabitatController;

    var_dump($controller->atualizarHabitat($form));
  }

  $template = new Template;
?>

  <h2>Atualizar habitat</h2>

  <form action="atualizarHabitat.php" method="post">
    <input type="number" name='id' placeholder="Identificação do habitat" required/>
    <input type="text" name="nome" placeholder="Nome do habitat"/>
    <input type="text" name="bioma" placeholder="Bioma do habitat"/>
    <input type="text" name="pais" placeholder="País do habitat" required/>
    <button type="submit" name="btn-enviar">Inserir</button>
  </form>
