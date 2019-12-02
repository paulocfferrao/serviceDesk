<?php
  if (isset($_GET['msg'])) {
    if ($_GET['msg']=='200') {
?>
      <div class="alert alert-success" role="alert">
        Item enviado com sucesso!
      </div>

<?php
    }elseif ($_GET['msg']=='201') {
?>
      <div class="alert alert-success" role="alert">
        Item alterado com sucesso!
      </div>
<?php
}elseif ($_GET['msg']=='202') {
?>
      <div class="alert alert-success" role="alert">
        Item excluido com sucesso!
      </div>
<?php
    }elseif ($_GET['msg']=='400') {
?>
    <div class="alert alert-danger" role="alert">
      Não é possível excuir item já utilizado!
    </div>

<?php
    }elseif ($_GET['msg']=='401') {
?>
<div class="alert alert-danger" role="alert">
  Você não tem permição para realizar esta operação, contate o administrador!

</div>

<?php
}
}
?>
