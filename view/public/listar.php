<?php
$path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
require_once $path.'controller/FotoController.php';
include_once 'Template.php';

$busca = $_GET['busca'] ?? '';

$c = new FotoController;

$listaEspecie = $c->listarEspecieFoto($busca);

$template = new Template();
 ?>

<h2>Listagem de animais em Extinção</h2>

<form id="form-busca" action="listar.php" method="get">
  <input type="text" name="busca" placeholder="Busque o nome de uma espécie aqui"/>
  <button type="submit">  Ver Lista </button>
</form>

<section>
<?php
  foreach ($listaEspecie as $especie) {
    ?>
    <div class="div-registro">
      <h3><?= $especie->getEspecie()->getNome() ?></h3>
      <img src=<?="'../../".$especie->getUrlFoto()."'"?> alt=<?="'".$especie->getEspecie()->getNome()."'"?>/>
      <p><b>País: </b><?= $especie->getEspecie()->getHabitat()->getPais() ?></p>
      <p><b>Habitat: </b><?= $especie->getEspecie()->getHabitat()->getNome() ?> (<?= $especie->getEspecie()->getHabitat()->getBioma() ?>)</p>
      <p><b>Descrição: </b><?= $especie->getEspecie()->getDescricao() ?></p>
      <p><b>Motivo de estar na lista de animais em extinção: </b>
      <?= $especie->getEspecie()->getMotivo() ?></p>
      <p><b>População: </b><?= $especie->getEspecie()->getPopulacao() ?></p>
    </div>
  <?php }?>
</section>
