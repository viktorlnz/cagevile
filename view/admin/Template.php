<?php
class Template{
  public function __construct(string $titulo = "Cagevile Admin"){ ?>
    <!DOCTYPE html>
    <html lang="pt-br" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title><?=$titulo?></title>
        <link rel="stylesheet" href="../css/estilo.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      </head>
      <body>
        <header>
          <h1>Cagevile admin</h1>
          <nav id="menu">
            <ul>
              <a href="buscarHabitat.php"><li>Ver Habitats</li></a>
              <a href="inserirHabitat.php"><li>Inserir um Habitat</li></a>
              <a href="buscarEspecie.php"><li>Ver espécies</li></a>
              <a href="inserirEspecie.php"><li>Inserir uma espécie</li></a>
              <a href="inserirImagem.php"><li>Inserir Imagem para a espécie</li></a>
              <a href="listarRecomendacao.php"><li>Ver Recomendações</li></a>
            </ul>
          </nav>
        </header>
          <section id="main">
  <?php }

  public function __destruct(){ ?>
      </section>
    </body>
  </html>
  <?php }
}
 ?>
