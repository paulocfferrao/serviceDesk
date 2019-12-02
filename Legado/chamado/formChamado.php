<?php

require_once('..\cabecalho.php');
$tabela="chamados";
require_once('..\sqlLista.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $acao="editar&id=$id";
  $chamado['id'] = $id;
  $chamado['titulo'] = buscaValor($_GET['id'],"chamados","titulo",$con);
  $chamado['descricao'] = buscaValor($_GET['id'],"chamados","descricao",$con);
  $chamado['id_requerente'] = buscaValor($_GET['id'],"chamados","idrequerente",$con);
  $chamado['id_categoria'] = buscaValor($_GET['id'],"chamados","idcategoria",$con);
  $chamado['id_computador'] = buscaValor($_GET['id'],"chamados","idcomputador",$con);
  $chamado['STATUS'] = buscaValor($_GET['id'],"chamados","STATUS",$con);
  $chamado['solucao'] = buscaValor($_GET['id'],"chamados","solucao",$con);


}else{
  $acao="novo";
}

 ?>

 <div class="container">
 	<div class="d-flex justify-content-center h-100">
 		<div class="card">
 			<div class="card-body">
 				<form class="" action="opChamado.php?acao=<?=$acao?>" method="post">
 					<div class="input-group form-group">
 						<input name="titulo" type="text" class="form-control"placeholder="Título" value="<?php if(isset($chamado)) echo $chamado['titulo'];?>">
 					</div>
 					<div class="input-group form-group">
 						<textarea class="form-control" name="descricao" rows="5" placeholder="Descrição">
              <?php if(isset($chamado)) echo $chamado['descricao'];?>
            </textarea>
 					</div>
          <div class="input-group form-group">
          <select class="form-control" name="id_categoria" required="true">
            <option value="">
              Selecione uma categoria
            </option>
            <?php
              $tabela="categoria";
              require_once('..\sqlListaCategoria.php');
              foreach($lista_categoria as $item){
            ?>
              <option value="<?= $item['id']; ?>" <?php if (isset($chamado)) {if ($item['id']==$chamado['id_categoria']) {echo "selected";}} ?> >
                <?= $item['descricao']; ?>
              </option>
            <?php } ?>
          </select>
          </div>
          <div class="input-group form-group">
          <select class="form-control" name="id_computador" required="true">
            <option value="">
              Selecione um computador
            </option>
            <?php
              $tabela="computador";
              require_once('..\sqlListaComputador.php');
              foreach($lista_computador as $item){
            ?>
              <option value="<?= $item['id']; ?>" <?php if (isset($chamado)) {if($item['id']==$chamado['id_computador']) {echo "selected";}} ?>>
                <?= $item['nome']; ?>
              </option>
            <?php } ?>
          </select>
          </div>
          <?php if (isset($chamado)) {?>
            <div class="input-group form-group">
              <textarea class="form-control" name="solucao" rows="5" placeholder="Solução"><?php echo $chamado['solucao'];?></textarea>
            </div>
          <?php } ?>
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
