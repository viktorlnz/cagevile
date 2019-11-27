<?php require_once 'Template.php';
    $path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
    require_once $path.'model/Especie.php';
    require_once $path.'controller/EspecieController.php';
    require_once $path.'controller/FotoController.php';

    $id = $_POST['id-animal'] ?? null;

    if($id !== null){
        $especie = new Especie($id, null, null, null, null, null);
        $principal = $_POST['principal'] ?? false;

        $controller = new FotoController();
        $controller->inserirFoto($especie, $principal);
    }

    $controllerAnimal = new EspecieController;

    $especies = $controllerAnimal->buscarEspecie("");

    $template = new Template;
?>

<form class="form-standard" enctype='multipart/form-data' action="inserirImagem.php" method = 'POST'>
    <input type="hidden" name = 'MAX_FILE_SIZE' value = "1000000"/>
    <label for="photo">Enviar a imagem do animal: </label>
    <input type="file" id="photo" name = 'foto' required/>
    <label for="id">Id do animal: </label>
    <select name="id-animal" required>
      <?php
      foreach ($especies as $e) {
      echo'<option value="'.$e->getId().'">'.$e->getNome().'</option>';
      }
      ?>
    </select>
    <label for="main">É a foto principal da espécie?</label>
    <input type = "checkbox" id="main" name='principal'/>
    <button type = "submit" >Enviar Foto</button>
</form>
