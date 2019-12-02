<?php

require_once('..\cabecalho.php');


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $acao="editar&id=$id";
  $computador['id'] = $id;
  $computador['nome'] = buscaValor($_GET['id'],"computador","nome",$con);
}else{
  $acao="novo";
}

 ?>

 <div class="container">
 	<div class="d-flex justify-content-center h-100">
 		<div class="card">
 			<div class="card-body">
 				<form class="" action="opcomputador.php?acao=<?=$acao?>" method="post">
 					<div class="input-group form-group">
 						<input name="nome" type="text" class="form-control"placeholder="Nome" value="<?php if(isset($computador)) echo $computador['nome'];?>">
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
