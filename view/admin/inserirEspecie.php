<?php require_once 'Template.php';
$path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
  require_once $path.'model/Habitat.php';
  require_once $path.'controller/HabitatController.php';
  require_once $path.'model/Especie.php';
  require_once $path.'controller/EspecieController.php';

  $form = new Especie(null, $_POST['nome'] ?? null,
   new Habitat($_POST['habitat'] ?? null, null, null, null),
    $_POST['descricao'] ?? null,
  $_POST['motivo'] ?? null, $_POST['populacao'] ?? null);

  if($form->getNome() !== null){
    $controller = new EspecieController;

    var_dump($controller->inserirEspecie($form));
  }

  $controllerHabitat = new HabitatController;

  $habitats = $controllerHabitat->buscarHabitat("");

  $template = new Template;
?>

  <h2>Inserir Espécie</h2>

  <form class="form-standard" action="inserirEspecie.php" method="post">
    <label for="name">Nome da espécie:</label>
    <input type="text" id="name" name="nome" placeholder="Nome da espécie" required/>
    <label for="habit">Habitat da espécie:</label>
    <select id="habit" name="habitat" required>
      <?php
      foreach ($habitats as $h) {
      echo'<option value="'.$h->getId().'">'.$h->getNome().'</option>';
      }
      ?>
    </select>
    <label for="description">Descrição da espécie:</label>
    <textarea id="description" name="descricao" placeholder="Descrição da espécie" required></textarea>
    <label for="reason">Motivo para extinção:</label>
    <textarea id="reason" name="motivo" placeholder="Qual o motivo da extinção da espécie?" required></textarea>
    <label for="population">População da espécie:</label>
    <input type= "text" id="population" name="populacao" placeholder="Qual a população da espécie?" required/>
    <button type="submit" name="btn-enviar">Inserir</button>
  </form>
