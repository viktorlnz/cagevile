<?php
class Template{
  public function __construct(string $titulo = "Cagevile"){ ?>
    <!DOCTYPE html>
    <html lang="pt-br">
      <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" href="../css/estilo.css">
        <title><?=$titulo?></title>
      </head>
      <body>
        <header>
          <h1>Cagevile</h1>
          <nav id = "menu">
            <div trol = "menu">
        				<ul>
        					<a href = "index.php" ><li>Home</li></a>
        					<a href = "cadastrar.php"><li>Cadastrar</li></a>
        					<a href = "listar.php"><li>Lista</li></a>
        				</ul>
            </div>
          </nav>
        </header>
        <section id = "main">
  <?php }

  public function __destruct(){ ?>
    </section>
    <footer>
      <p>Contate nós através dos telefones (11)96363-8539 ou (11)96438-8699</p>
    </footer>
  </body>
</html>
  <?php }
}
 ?>
