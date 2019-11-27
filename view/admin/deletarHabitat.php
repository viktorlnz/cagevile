<?php require_once 'Template.php';
  $path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
  require_once $path.'controller/HabitatController.php';
  require_once $path.'model/Habitat.php';

  $form = $_POST['id'] ?? null;

  if($form !== null){
    $controller = new HabitatController;

    var_dump($controller->deletarHabitat($form));
  }
  $template = new Template;
?>

  <h2>Deletar Habitat</h2>

  <form action="deletarHabitat.php" method="post">
    <input type="number" name="id" placeholder="Id do habitat" required/>
    <button type="submit" name="btn-enviar">Deletar Habitat</button>
  </form>
