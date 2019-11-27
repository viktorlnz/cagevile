<?php
  $path = $_SERVER['DOCUMENT_ROOT'].'/cagevile/';
  require_once $path.'model/Recomendacao.php';
  require_once $path.'controller/RecomendacaoController.php';

  $rec = new Recomendacao(
    null,
    $_POST['nome'] ?? null,
    $_POST['habitat'] ?? null,
    $_POST['descricao'] ?? null
  );

  if ($rec->getDescricao() !== null){
    $controller = new RecomendacaoController;

    $sucesso = $controller->inserirRecomendacao($rec);

    $sucesso = $sucesso > 0 ? 1 : 0;

    header("Location: cadastrar.php?s=".$sucesso);
  }
?>
