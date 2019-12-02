<?php
session_start();

require_once('pdo.php');


if (!isset($_SESSION['user'])){
  header('Location:..\index.php');
}else{
  $user = $_SESSION['user'];
  $senha = $_SESSION['senha'];
  $sql  = "SELECT count(*) as qtd FROM usuarios WHERE user=:user AND senha=:senha";
  $query = $con->prepare($sql);
  $params = array('user'=>$user,'senha'=>$senha);
  $r = $query->execute($params);
  $result = $query->fetch();
  if($result['qtd']!=1){
    header('Location:..\index.php');

  }

}
function buscaValor($id,$tabelaBusca,$colunaBusca,$con){
  $sql  = "SELECT * FROM $tabelaBusca WHERE id=:id;";
  $query = $con->prepare($sql);
  $params = array('id'=>$id);
  $r = $query->execute($params);
  $registro = $query->fetch();
  return $registro[$colunaBusca];
}

function testaAdmin($user,$con){
  if ($user=="admin") {
    return true;
  }else {
    return false;
  }
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Chamados Web</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<script type="text/javascript">
function printpage()
  {
  window.print()
  }
</script>
<style>
body{
 background-image: url('../img/fundo2.png');
 background-size: cover;
 background-repeat: no-repeat;
 height: 100%;
 width: 100%;
 font-family: 'Numans', sans-serif;
}

</style>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Bem vindo <?= $_SESSION['user']?>!</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#corNavbar01" aria-controls="corNavbar01" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="corNavbar01">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="..\chamado\formChamado.php">Novo chamado<span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="..\chamado\listaChamados.php">Chamados</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="..\usuario\listaUsuario.php">Usuários</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="..\computador\listaComputador.php">Computadores</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="..\categoria\listaCategoria.php">Categorias</a>
            </li>
          </ul>
          <form class="form-inline">
            <input type="button" class="btn btn-outline-info my-2 my-sm-0" value="Relatório" onclick="printpage()" />
            
          </form>
          <a href="..\sair.php"><input type="submit" class="btn btn-outline-info" value="Sair">  </a>
        </div>
      </nav>
  </header>
<?php include_once('../exibeMsg.php'); ?>
