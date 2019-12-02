<?php

require_once('..\cabecalho.php');


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $acao="editar&id=$id";
  $Categoria['id'] = $id;
  $Categoria['descricao'] = buscaValor($_GET['id'],"categoria","descricao",$con);
}else{
  $acao="novo";
}

 ?>

 <div class="container">
 	<div class="d-flex justify-content-center h-100">
 		<div class="card">
 			<div class="card-body">
 				<form class="" action="opCategoria.php?acao=<?=$acao?>" method="post">
 					<div class="input-group form-group">
 						<input name="descricao" type="text" class="form-control"placeholder="Descrição" value="<?php if(isset($Categoria)) echo $Categoria['descricao'];?>">
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
