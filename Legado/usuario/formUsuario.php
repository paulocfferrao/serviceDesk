<?php

require_once('..\cabecalho.php');


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $acao="editar&id=$id";
  $usuario['id'] = $id;
  $usuario['user'] = buscaValor($_GET['id'],"usuarios","user",$con);
  $usuario['senha'] = buscaValor($_GET['id'],"usuarios","senha",$con);
  $usuario['tipo'] = buscaValor($_GET['id'],"usuarios","tipo",$con);


}else{
  $acao="novo";
}

 ?>

 <div class="container">
 	<div class="d-flex justify-content-center h-100">
 		<div class="card">
 			<div class="card-body">
 				<form class="" action="opUsuario.php?acao=<?=$acao?>" method="post">
 					<div class="input-group form-group">
 						<input name="user" type="text" class="form-control"placeholder="User" value="<?php if(isset($usuario)) echo $usuario['user'];?>">
 					</div>
          <div class="input-group form-group">
 						<input name="senha" type="password" class="form-control"placeholder="Senha" value="">
 					</div>
          <div class="input-group form-group">
            <select class="form-control" name="tipo">
              <option value="">Selecione um tipo</option>
              <option value="requerente" <?php if (isset($usuario)) {if ($usuario['tipo']=="requerente") {echo "selected";}} ?>>Requerente</option>
              <option value="tecnico" <?php if (isset($usuario)) {if ($usuario['tipo']=="tecnico") {echo "selected";}} ?>>Técnico</option>
              <?php //Testar se usuario logado é admin ?>
              <option value="admin" <?php if (isset($usuario)) {if ($usuario['tipo']=="admin") {echo "selected";}} ?>>Administrador</option>
            </select>
          </div>
 					<div class="form-group">
 						<input type="submit" value="Enviar" class="btn float-right login_btn">
 					</div>
				</form>
 			</div>
 		</div>
 	</div>
 </div>



 <?php
 require_once('..\rodape.php');

  ?>
