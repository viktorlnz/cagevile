<?php require_once 'Template.php';
$path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
  require_once $path.'controller/HabitatController.php';
  require_once $path.'model/Habitat.php';

  $form = new Habitat(null,
   $_POST['nome'] ?? null, $_POST['bioma'] ?? null,
  $_POST['pais'] ?? null);

  if($form->getNome() !== null){
    $controller = new HabitatController;

    var_dump($controller->inserirHabitat($form));
  }

  $template = new Template;
?>

  <h2>Inserir Habitat</h2>

  <form class="form-standard" action="inserirHabitat.php" method="post">
    <label for="name">Nome do habitat:</label>
    <input type="text" id="name" name="nome" placeholder="Nome do habitat" required/>
    <label for="biom">Bioma do habitat:</label>
    <input type="text" id="biom" name="bioma" placeholder="Bioma do habitat" required/>
    <label for="country">País do habitat:</label>
    <input type="text" id="country" name="pais" placeholder="Insira o país do habitat" required/>
    <button type="submit" name="btn-enviar">Inserir</button>
  </form>
