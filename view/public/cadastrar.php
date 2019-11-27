<?php
  include_once 'Template.php';

  $template = new Template();
 ?>
    <h2>Cadastro de Animais em Extinção</h2>
    <p class = "lik"> Essa pagina para cadastro de animais em extinção caso os animais não estejam no site, maneira de você usuário interaja com a gente 	&#9786; </p>

    <p class="lista orange">Segue  botão para sugestões de animais a cadastrar</p>
    <form class="form-standard" action="validarCadastro.php" method="post">
      <label for="in-name">Nome da espécie: </label>
      <input type="text" id="in-name" name="nome" placeholder="Nome da espécie" required/>
      <label for="in-habitat">Habitat da espécie: </label>
      <input type="text" id="in-habitat" name="habitat" placeholder="Habitat da espécie" required/>
      <label for="in-descricao">Descreva a espécie: </label>
      <textarea name="descricao" id="in-descricao" placeholder="Apresente a espécie, fale um pouco dela, qual a população da mesma, razão para estar em extinção, etc."></textarea>
      <button type="submit">Cadastrar Sugestão</button>
    </form>
