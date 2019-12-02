<?php
require_once('..\cabecalho.php');
if (isset($_GET['todos'])) {
  $todos=true;
}
$tabela = "chamados";
require('..\sqlLista.php');
require_once('..\getIdUser.php');
 ?>

<div class="chamados">
  <a href="formChamado.php">
    <input type="submit" class="btn btn-primary novo" value="Novo">
  </a>
  <a href="listaChamados.php?todos=1">
    <input type="submit" class="btn btn-primary novo" value="Mostrar todos">
  </a>

  <div class="list-group">

    <?php foreach($lista as $item):
            $id = $item['id'];
    ?>

    <a href="formChamado.php?id=<?= $item['id']?>" class="list-group-item list-group-item-action flex-column align-items-start">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1"><?= $item['titulo'] ?></h5>
        <?php $status = buscaValor($item['id'],"chamados","STATUS",$con); ?>
        <small><?= $status;?></small>
      </div>
      <p class="mb-1"><?= $item['descricao']?></p>
      <?php $requerente = buscaValor($item['idrequerente'],"usuarios","user",$con); ?>
      <small>Requerente: <?= $requerente;?></small></small>
    </a>
    <?php //}
     endforeach ?>

  </div>

</div>

<?php
require_once('..\rodape.php');
 ?>
