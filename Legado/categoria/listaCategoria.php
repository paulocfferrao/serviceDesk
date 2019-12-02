<?php
require_once('..\cabecalho.php');
$tabela="categoria";
require('..\sqlListaCategoria.php');
if (!testaAdmin($_SESSION['user'],$con)){
    header('Location:..\chamado\listaChamados.php?msg=401');
}
 ?>

<div class="chamados">


  <div class="list-group">
    <a href="formCategoria.php">
      <input type="submit" class="btn btn-primary novo" value="Novo">
    </a>
    <table>


    <?php

    foreach($lista_categoria as $item):
            $id = $item['id'];
    ?>

    <tr>
      <td class="col-sm-10">
    <a href="formCategoria.php?id=<?= $item['id']?>" class="list-group-item list-group-item-action flex-column align-items-start">
      <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1"><?= $item['descricao'] ?></h5>
      </div>
    </a>
  </td>
  <td class="col-sm-1">
    <a href="opCategoria.php?acao=excluir&id=<?= $item['id']?>">
      <input type="submit" class="btn btn-danger" value="Excluir">
    </a>
    </td>
  </tr>


    <?php endforeach ?>
    </table>
  </div>

</div>

<?php
require_once('..\rodape.php');
//>
 ?>
